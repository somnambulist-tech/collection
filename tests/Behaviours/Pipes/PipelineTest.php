<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Tests\Behaviours\Pipes;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;

/**
 * Class PipelineTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Pipes
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Pipes\PipelineTest
 */
class PipelineTest extends TestCase
{

    /**
     * @group collection
     * @group pipeline
     */
    public function testPipelineWithMethod()
    {
        $ud = new class {
            public function decorate(Collection $object)
            {
                $object->get('context')->set('user', 'ROOT');

                return $object;
            }
        };
        $sd = new class {
            public function decorate(Collection $object)
            {
                $object->get('context')->set('server', 'testing.example.example');

                return $object;
            }
        };

        $pipeline = new Collection();
        $pipeline->add($ud)->add($sd);

        $events = new Collection([
            new Collection(['name' => 'event 1', 'payload' => [], 'context' => new Collection()]),
            new Collection(['name' => 'event 2', 'payload' => [], 'context' => new Collection()]),
        ]);

        $decorated = $pipeline->pipeline($events, 'decorate');

        foreach ($decorated as $event) {
            $this->assertCount(2, $event->get('context'));
            $this->assertEquals('ROOT', $event->get('context')->get('user'));
            $this->assertEquals('testing.example.example', $event->get('context')->get('server'));
        }
    }

    /**
     * @group collection
     * @group pipeline
     */
    public function testPipelineWithClosure()
    {
        $ud = new class {
            public function decorate(Collection $object)
            {
                $object->get('context')->set('user', 'ROOT');

                return $object;
            }
        };
        $sd = new class {
            public function decorate(Collection $object)
            {
                $object->get('context')->set('server', 'testing.example.example');

                return $object;
            }
        };

        $col = new Collection();
        $col->add($ud)->add($sd);

        $events = new Collection([
            new Collection(['name' => 'event 1', 'payload' => [], 'context' => new Collection()]),
            new Collection(['name' => 'event 2', 'payload' => [], 'context' => new Collection()]),
        ]);

        $decorated = $col->pipeline($events, function ($operator, $item, $key) {
            return $operator->decorate($item);
        });

        foreach ($decorated as $event) {
            $this->assertCount(2, $event->get('context'));
            $this->assertEquals('ROOT', $event->get('context')->get('user'));
            $this->assertEquals('testing.example.example', $event->get('context')->get('server'));
        }
    }

}

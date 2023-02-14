<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Pipes;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

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
            new Collection(['name' => 'event 3', 'payload' => [], 'context' => new Collection()]),
        ]);

        $decorated = $pipeline->pipeline($events, 'decorate');

        $this->assertCount(3, $decorated);

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
            new Collection(['name' => 'event 3', 'payload' => [], 'context' => new Collection()]),
        ]);

        $decorated = $col->pipeline($events, function ($operator, $item, $key) {
            return $operator->decorate($item);
        });

        $this->assertCount(3, $decorated);

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
    public function testPipelinePreservesKeys()
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
            'key1' => new Collection(['name' => 'event 1', 'payload' => [], 'context' => new Collection()]),
            'foo' => new Collection(['name' => 'event 2', 'payload' => [], 'context' => new Collection()]),
            'bar' => new Collection(['name' => 'event 3', 'payload' => [], 'context' => new Collection()]),
        ]);

        $decorated = $col->pipeline($events, function ($operator, $item, $key) {
            return $operator->decorate($item);
        });

        $this->assertCount(3, $decorated);
        $this->assertArrayHasKey('key1', $decorated);
        $this->assertArrayHasKey('foo', $decorated);
        $this->assertArrayHasKey('bar', $decorated);
    }
}

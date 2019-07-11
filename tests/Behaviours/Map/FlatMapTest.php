<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Tests\Behaviours\Map;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;

/**
 * Class FlatMapTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Map
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Map\FlatMapTest
 */
class FlatMapTest extends TestCase
{

    /**
     * @group collection
     * @group map
     */
    public function testFlatMap()
    {
        $data = new Collection([
            ['name' => 'entity.created', 'context' => ['http', 'ssl', 'http://www.example.com']],
            ['name' => 'entity.updated', 'context' => ['cli', 'root']],
        ]);

        $data = $data->flatMap(function ($person) {
            return $person['context'];
        });

        $this->assertEquals(['http', 'ssl', 'http://www.example.com', 'cli', 'root'], $data->all());
    }

}

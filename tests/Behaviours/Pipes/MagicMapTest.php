<?php

namespace Somnambulist\Collection\Tests\Behaviours\Pipes;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;

/**
 * Class MagicMapTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Pipes
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Pipes\MagicMapTest
 */
class MagicMapTest extends TestCase
{

    /**
     * @group magic
     */
    public function testCallMethodDirectly()
    {
        $mock1 = new class {
            public function getValue()
            {
                return 'string';
            }
        };

        $col = new Collection([
            'bar' => $mock1,
            'baz' => $mock1,
        ]);

        $col = $col->map->getValue();

        $this->assertEquals(['bar' => 'string', 'baz' => 'string'], $col->toArray());
    }

    /**
     * @group magic
     */
    public function testCallMethodDirectlyNoKeys()
    {
        $mock1 = new class {
            public function getValue()
            {
                return 'string';
            }
        };

        $col = new Collection([
            $mock1,
            $mock1,
        ]);

        $col = $col->map->getValue();

        $this->assertEquals(['string', 'string'], $col->toArray());
    }
}

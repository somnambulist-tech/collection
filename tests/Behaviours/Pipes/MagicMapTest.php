<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Pipes;

use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

class MagicMapTest extends TestCase
{

    #[Group("magic")]
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

    #[Group("magic")]
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

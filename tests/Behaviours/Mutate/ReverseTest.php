<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Mutate;

use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

class ReverseTest extends TestCase
{

    #[Group("collection")]
    public function testReverse()
    {
        $col = new Collection([
            'bar' => 'baz',
            'baz' => 'foo',
            'foobar' => 'baz',
        ]);

        $this->assertEquals(['foobar' => 'baz', 'baz' => 'foo', 'bar' => 'baz'], $col->reverse()->toArray());
    }

}

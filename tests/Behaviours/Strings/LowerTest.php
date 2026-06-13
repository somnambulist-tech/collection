<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Strings;

use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

class LowerTest extends TestCase
{

    #[Group("text")]
    public function testLower()
    {
        $col = Collection::collect(['FOO', 'FooBar', 'baz BaR']);

        $this->assertCount(3, $col);

        $col = $col->lower();

        $this->assertContains('foo', $col);
        $this->assertContains('foobar', $col);
        $this->assertContains('baz bar', $col);
    }
}

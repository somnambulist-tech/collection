<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Strings;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

class UpperTest extends TestCase
{

    /**
     * @group text
     */
    public function testUpper()
    {
        $col = Collection::collect(['FOO', 'FooBar', 'baz BaR']);

        $this->assertCount(3, $col);

        $col = $col->upper();

        $this->assertContains('FOO', $col);
        $this->assertContains('FOOBAR', $col);
        $this->assertContains('BAZ BAR', $col);
    }
}

<?php

namespace Somnambulist\Components\Collection\Tests\Behaviours\Strings;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

/**
 * Class UpperTest
 *
 * @package    Somnambulist\Components\Collection\Tests\Behaviours\Strings
 * @subpackage Somnambulist\Components\Collection\Tests\Behaviours\Strings\UpperTest
 */
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

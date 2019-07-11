<?php

namespace Somnambulist\Collection\Tests\Behaviours\Strings;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;

/**
 * Class UpperTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Strings
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Strings\UpperTest
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

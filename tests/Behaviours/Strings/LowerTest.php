<?php

namespace Somnambulist\Collection\Tests\Behaviours\Strings;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;

/**
 * Class LowerTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Strings
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Strings\LowerTest
 */
class LowerTest extends TestCase
{

    /**
     * @group text
     */
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

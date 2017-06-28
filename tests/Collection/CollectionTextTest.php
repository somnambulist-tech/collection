<?php

namespace Somnambulist\Tests\Collection\Collection;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\Collection;

/**
 * Class CollectionTextTest
 *
 * @package    Somnambulist\Tests\Collection\Collection
 * @subpackage Somnambulist\Tests\Collection\Collection\CollectionTextTest
 */
class CollectionTextTest extends TestCase
{

    /**
     * @group text
     */
    public function testTrim()
    {
        $col = Collection::collect(['foo  ', '  bar', '  baz  ']);

        $this->assertCount(3, $col);

        $col = $col->trim();

        $this->assertContains('foo', $col);
        $this->assertContains('bar', $col);
        $this->assertContains('baz', $col);
    }

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

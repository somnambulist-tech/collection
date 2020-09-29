<?php

namespace Somnambulist\Components\Collection\Tests\Behaviours\Strings;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

/**
 * Class TrimTest
 *
 * @package    Somnambulist\Components\Collection\Tests\Behaviours\Strings
 * @subpackage Somnambulist\Components\Collection\Tests\Behaviours\Strings\TrimTest
 */
class TrimTest extends TestCase
{

    /**
     * @group text
     * @group trim
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
}

<?php

namespace Somnambulist\Collection\Tests\Behaviours\Strings;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;

/**
 * Class TrimTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Strings
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Strings\TrimTest
 */
class TrimTest extends TestCase
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
}

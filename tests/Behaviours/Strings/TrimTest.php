<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Strings;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

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

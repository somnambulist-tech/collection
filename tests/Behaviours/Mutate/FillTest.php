<?php

declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Mutate;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

/**
 * Class FillTest
 *
 * @package    Somnambulist\Components\Collection\Tests\Behaviours\Mutate
 * @subpackage Somnambulist\Components\Collection\Tests\Behaviours\Mutate\FillTest
 */
class FillTest extends TestCase
{


    /**
     * @group collection
     * @group fill
     */
    public function testFill()
    {
        $col = Collection::collect([])->fill(0, 10, 'var');

        $this->assertCount(10, $col);
        $this->assertContains('var', $col);
    }

    /**
     * @group collection
     * @group fill
     */
    public function testFillKeysWith()
    {
        $col = Collection::collect(['foo', 'bar', 'baz'])->fillKeysWith('test');

        $this->assertCount(3, $col);
        $this->assertArrayHasKey('foo', $col);
        $this->assertArrayHasKey('bar', $col);
        $this->assertArrayHasKey('baz', $col);
        $this->assertEquals('test', $col['bar']);
    }
}

<?php

namespace Somnambulist\Components\Collection\Tests\Behaviours\Query;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;
use Somnambulist\Components\Collection\Tests\Fixtures\TestClass4;

/**
 * Class FindTest
 *
 * @package    Somnambulist\Components\Collection\Tests\Behaviours\Query
 * @subpackage Somnambulist\Components\Collection\Tests\Behaviours\Query\FindTest
 */
class FindTest extends TestCase
{

    /**
     * @group search
     */
    public function testFind()
    {
        $col        = new Collection(new TestClass4());
        $col['bar'] = 'too';

        $this->assertEquals('too', $col->find('too'));
        $this->assertFalse($col->find('baz'));
    }

    /**
     * @group search
     */
    public function testFindWithClosure()
    {
        $col        = new Collection(new TestClass4());
        $col['bar'] = 'too';

        $this->assertEquals('too', $col->find(function ($value, $key) { return 'bar' === $key; }));
    }

    /**
     * @group search
     */
    public function testFindLast()
    {
        $col        = new Collection([
            10, 11, 12, 13, 14, 15,
        ]);

        $this->assertEquals(15, $col->findLast(function ($value, $key) { return $value > 10; }));
    }

    /**
     * @group search
     */
    public function testFindLastReturnsFalseIfNotFound()
    {
        $col        = new Collection([
            10, 11, 12, 13, 14, 15,
        ]);

        $this->assertFalse($col->findLast(function ($value, $key) { return $value < 10; }));
    }
}

<?php

namespace Somnambulist\Collection\Tests\Behaviours\Query;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;
use Somnambulist\Collection\Tests\Fixtures\TestClass4;

/**
 * Class FindTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Query
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Query\FindTest
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
}

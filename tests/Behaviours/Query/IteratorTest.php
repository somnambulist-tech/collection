<?php

namespace Somnambulist\Collection\Tests\Behaviours\Query;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;
use Somnambulist\Collection\Tests\Fixtures\TestClass4;

/**
 * Class IteratorTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Query
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Query\IteratorTest
 */
class IteratorTest extends TestCase
{

    /**
     * @group array
     */
    public function testIterator()
    {
        $col = new Collection(new TestClass4());
        $col['bar'] = 'too';

        foreach ($col as $key => $value) {

        }

        $this->assertTrue(true);
    }

    /**
     * @group array
     */
    public function testGetIterator()
    {
        $col = new Collection(new TestClass4());
        $col['bar'] = 'too';

        $this->assertInstanceOf(\ArrayIterator::class, $col->getIterator());
    }
}

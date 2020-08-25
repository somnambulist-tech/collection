<?php

namespace Somnambulist\Collection\Tests\Behaviours\Query;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;
use Somnambulist\Collection\Tests\Fixtures\SortableObject;
use function strcmp;

/**
 * Class SortTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Query
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Query\SortTest
 */
class SortTest extends TestCase
{

    /**
     * @group sort
     */
    public function testSortByValue()
    {
        $col = new Collection([
            'ztest' => 'test',
            'atest' => 'testa',
            'gtest' => 'tests',
            'etest' => 'testd',
            'utest' => 'teste',
            'btest' => 'testp',
        ]);

        $col->sortBy('value');

        $expected = [
            'ztest' => 'test',
            'atest' => 'testa',
            'etest' => 'testd',
            'utest' => 'teste',
            'btest' => 'testp',
            'gtest' => 'tests',
        ];

        $this->assertEquals($expected, $col->toArray());
    }

    /**
     * @group sort
     */
    public function testSortByValueReversed()
    {
        $col = new Collection([
            'ztest' => 'test',
            'atest' => 'testa',
            'gtest' => 'tests',
            'etest' => 'testd',
            'utest' => 'teste',
            'btest' => 'testp',
        ]);

        $col->sortBy('value', 'desc');

        $expected = [
            'gtest' => 'tests',
            'btest' => 'testp',
            'utest' => 'teste',
            'etest' => 'testd',
            'atest' => 'testa',
            'ztest' => 'test',
        ];

        $this->assertEquals($expected, $col->toArray());
    }

    /**
     * @group sort
     */
    public function testSortByKey()
    {
        $col = new Collection([
            'ztest' => 'test',
            'atest' => 'test',
            'gtest' => 'test',
            'etest' => 'test',
            'utest' => 'test',
            'btest' => 'test',
        ]);

        $col->sortBy('key');

        $this->assertEquals(['atest', 'btest', 'etest', 'gtest', 'utest', 'ztest'], $col->keys()->toArray());
    }

    /**
     * @group sort
     */
    public function testSortByKeyReversed()
    {
        $col = new Collection([
            'ztest' => 'test',
            'atest' => 'test',
            'gtest' => 'test',
            'etest' => 'test',
            'utest' => 'test',
            'btest' => 'test',
        ]);

        $col->sortBy('key', 'desc');

        $this->assertEquals(['ztest', 'utest', 'gtest', 'etest', 'btest', 'atest'], $col->keys()->toArray());
    }

    /**
     * @group sort
     */
    public function testSort()
    {
        $col = new Collection([
            'ztest' => 'test',
            'atest' => 'testa',
            'gtest' => 'tests',
            'etest' => 'testd',
            'utest' => 'teste',
            'btest' => 'testp',
        ]);

        $col->sort(fn ($a, $b) => strcmp($a, $b));

        $expected = [
            'ztest' => 'test',
            'atest' => 'testa',
            'etest' => 'testd',
            'utest' => 'teste',
            'btest' => 'testp',
            'gtest' => 'tests',
        ];

        $this->assertEquals($expected, $col->toArray());
    }

    /**
     * @group sort
     */
    public function testSortMaintainsKeyAssociation()
    {
        $col = new Collection([
            'ztest' => 'test',
            'atest' => 'testa',
            'gtest' => 'tests',
            'etest' => 'testd',
            'utest' => 'teste',
            'btest' => 'testp',
        ]);

        $col->sort(fn ($a, $b) => strcmp($a, $b));

        $expected = [
            'ztest' => 'test',
            'atest' => 'testa',
            'etest' => 'testd',
            'utest' => 'teste',
            'btest' => 'testp',
            'gtest' => 'tests',
        ];

        $this->assertEquals($expected, $col->toArray());
    }

    /**
     * @group sort
     */
    public function testSortBySpecifyingMethodOrProperty()
    {
        $col = new Collection([
            $a = new SortableObject('foo'),
            $b = new SortableObject('bar'),
            $c = new SortableObject('baz'),
            $d = new SortableObject('aardvark'),
            $e = new SortableObject('test'),
        ]);

        $col->sort('name');

        $expected = [
            $d, $b, $c, $a, $e
        ];

        $this->assertSame($expected, $col->values()->toArray());
    }
}

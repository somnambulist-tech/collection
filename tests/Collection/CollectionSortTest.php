<?php

namespace Somnambulist\Tests\Collection\Collection;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\Collection;

/**
 * Class CollectionSortTest
 *
 * @package    Somnambulist\Tests\Collection\Collection
 * @subpackage Somnambulist\Tests\Collection\Collection\CollectionSortTest
 */
class CollectionSortTest extends TestCase
{

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

        $col->sortByKey();

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

        $col->sortByKeyReversed();

        $this->assertEquals(['ztest', 'utest', 'gtest', 'etest', 'btest', 'atest'], $col->keys()->toArray());
    }

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

        $col->sortByValue();

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

        $col->sortByValueReversed();

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
    public function testSortUsing()
    {
        $col = new Collection([
            'ztest' => 'test',
            'atest' => 'testa',
            'gtest' => 'tests',
            'etest' => 'testd',
            'utest' => 'teste',
            'btest' => 'testp',
        ]);

        $col->sortUsing(function ($a, $b) {
            return strcmp($a, $b);
        });

        $expected = [
            'test',
            'testa',
            'testd',
            'teste',
            'testp',
            'tests',
        ];

        $this->assertEquals($expected, $col->toArray());
    }

    /**
     * @group sort
     */
    public function testSortKeepingKeysUsing()
    {
        $col = new Collection([
            'ztest' => 'test',
            'atest' => 'testa',
            'gtest' => 'tests',
            'etest' => 'testd',
            'utest' => 'teste',
            'btest' => 'testp',
        ]);

        $col->sortKeepingKeysUsing(function ($a, $b) {
            return strcmp($a, $b);
        });

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
}

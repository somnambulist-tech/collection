<?php

namespace Somnambulist\Collection\Tests\Behaviours\Query;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;

/**
 * Class SortValuesTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Query
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Query\SortValuesTest
 */
class SortValuesTest extends TestCase
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

        $col->sortUsingWithKeys(function ($a, $b) {
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

<?php

namespace Somnambulist\Collection\Tests\Behaviours\Query;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;

/**
 * Class SortKeysTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Query
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Query\SortKeysTest
 */
class SortKeysTest extends TestCase
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
}

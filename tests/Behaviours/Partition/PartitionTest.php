<?php

namespace Somnambulist\Components\Collection\Tests\Behaviours\Partition;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

/**
 * Class PartitionTest
 *
 * @package    Somnambulist\Components\Collection\Tests\Behaviours\Partition
 * @subpackage Somnambulist\Components\Collection\Tests\Behaviours\Partition\PartitionTest
 */
class PartitionTest extends TestCase
{

    /**
     * @group partition
     */
    public function testPartition()
    {
        $collection = new Collection(range(1, 10));
        [$firstPartition, $secondPartition] = $collection->partition(function ($i) {
            return $i <= 5;
        });
        $this->assertEquals([1, 2, 3, 4, 5], $firstPartition->values()->toArray());
        $this->assertEquals([6, 7, 8, 9, 10], $secondPartition->values()->toArray());
    }

    /**
     * @group partition
     */
    public function testPartitionByKey()
    {
        $courses = new Collection([
            ['free' => true, 'title' => 'Basic'], ['free' => false, 'title' => 'Premium'],
        ]);
        [$free, $premium] = $courses->partition('free');
        $this->assertSame([['free' => true, 'title' => 'Basic']], $free->values()->toArray());
        $this->assertSame([['free' => false, 'title' => 'Premium']], $premium->values()->toArray());
    }

    /**
     * @group partition
     */
    public function testPartitionPreservesKeys()
    {
        $courses = new Collection([
            'a' => ['free' => true], 'b' => ['free' => false], 'c' => ['free' => true],
        ]);
        [$free, $premium] = $courses->partition('free');
        $this->assertSame(['a' => ['free' => true], 'c' => ['free' => true]], $free->toArray());
        $this->assertSame(['b' => ['free' => false]], $premium->toArray());
    }

    /**
     * @group partition
     */
    public function testPartitionEmptyCollection()
    {
        $collection = new Collection();
        $this->assertCount(2, $collection->partition(function () {
            return true;
        }));
    }
}

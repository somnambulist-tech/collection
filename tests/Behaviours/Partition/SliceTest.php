<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Tests\Behaviours\Partition;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;

/**
 * Class SliceTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Partition
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Partition\SliceTest
 */
class SliceTest extends TestCase
{

    /**
     * @group collection
     * @group slice
     */
    public function testSlice()
    {
        $col = new Collection([
            'foo' => 1,
            'baz' => 2,
            'bob' => 3,
        ]);

        $ret = $col->slice(2);

        $this->assertEquals(['bob' => 3], $ret->toArray());
    }
}

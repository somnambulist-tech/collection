<?php

declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Partition;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

/**
 * Class SliceTest
 *
 * @package    Somnambulist\Components\Collection\Tests\Behaviours\Partition
 * @subpackage Somnambulist\Components\Collection\Tests\Behaviours\Partition\SliceTest
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

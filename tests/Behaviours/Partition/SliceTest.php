<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Partition;

use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

class SliceTest extends TestCase
{

    #[Group("collection")]
    #[Group("slice")]
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

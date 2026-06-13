<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Query;

use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;
use Somnambulist\Components\Collection\Tests\Fixtures\TestClass4;

class CountTest extends TestCase
{

    #[Group("array")]
    public function testCount()
    {
        $col = new Collection(new TestClass4());
        $col->bar = 'too';

        $this->assertCount(2, $col);
        $this->assertEquals(2, $col->count());
    }
}

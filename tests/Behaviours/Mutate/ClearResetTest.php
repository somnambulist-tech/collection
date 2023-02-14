<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Mutate;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;
use Somnambulist\Components\Collection\Tests\Fixtures\TestClass4;

class ClearResetTest extends TestCase
{

    /**
     * @group collection
     */
    public function testClear()
    {
        $col = new Collection(new TestClass4());

        $this->assertCount(1, $col);
        $col->clear();
        $this->assertCount(0, $col);
    }

    /**
     * @group collection
     */
    public function testReset()
    {
        $col = new Collection(new TestClass4());

        $this->assertCount(1, $col);
        $col->reset();
        $this->assertCount(0, $col);
    }

}

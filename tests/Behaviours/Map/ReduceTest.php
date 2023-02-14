<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Map;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

class ReduceTest extends TestCase
{

    /**
     * @group collection
     */
    public function testReduce()
    {
        $col = new Collection([
            'foo' => 1,
            'baz' => 2,
            'bob' => 3,
        ]);
        $initial = 0;

        $ret = $col->reduce(function ($carry, $var) {
            return $carry + ($var * $var);
        }, $initial);

        $this->assertNotNull($ret);
        $this->assertEquals(14, $ret);
    }

}

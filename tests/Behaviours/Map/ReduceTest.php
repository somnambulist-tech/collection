<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Tests\Behaviours\Map;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;

/**
 * Class ReduceTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Map
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Map\ReduceTest
 */
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

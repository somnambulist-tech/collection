<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Mutate;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

class ShuffleTest extends TestCase
{

    /**
     * @group collection
     */
    public function testShuffle()
    {
        $col = new Collection([
            'foo' => 1,
            'baz' => 2,
            'bob' => 3,
        ]);

        $ret = $col->shuffle();

        $this->assertInstanceOf(Collection::class, $ret);
    }
}

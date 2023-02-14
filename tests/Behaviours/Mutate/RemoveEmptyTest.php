<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Mutate;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

class RemoveEmptyTest extends TestCase
{

    /**
     * @group collection
     */
    public function testRemoveEmpty()
    {
        $col = Collection::collect(['foo', 'bar', null, 'baz', '', false, 0]);

        $this->assertCount(7, $col);

        $col = $col->removeEmpty();

        $this->assertCount(4, $col);
    }

}

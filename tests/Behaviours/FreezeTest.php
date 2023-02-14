<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\FrozenCollection as Immutable;
use Somnambulist\Components\Collection\MutableCollection as Collection;

class FreezeTest extends TestCase
{
    /**
     * @group collection
     */
    public function testFreezeReturnsImmutable()
    {
        $col = new Collection();

        $this->assertInstanceOf(Immutable::class, $col->freeze());
    }
}

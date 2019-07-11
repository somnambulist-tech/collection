<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Tests\Behaviours;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\FrozenCollection as Immutable;
use Somnambulist\Collection\MutableCollection as Collection;

/**
 * Class FreezeTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours
 * @subpackage Somnambulist\Collection\Tests\Behaviours\FreezeTest
 */
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

<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Tests\Behaviours\Mutate;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;

/**
 * Class RemoveNullsTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Mutate
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Mutate\RemoveNullsTest
 */
class RemoveNullsTest extends TestCase
{

    /**
     * @group collection
     */
    public function testRemoveNulls()
    {
        $col = Collection::collect(['foo', 'bar', null, 'baz', null]);

        $this->assertCount(5, $col);

        $col = $col->removeNulls();

        $this->assertCount(3, $col);
    }

}

<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Tests\Behaviours\Query;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;

/**
 * Class UniqueTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Query
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Query\UniqueTest
 */
class UniqueTest extends TestCase
{

    /**
     * @group collection
     */
    public function testUnique()
    {
        $col = new Collection([
            'bar' => 'baz',
            'baz' => 'foo',
            'foobar' => 'baz',
        ]);

        $this->assertEquals(['bar' => 'baz', 'baz' => 'foo'], $col->unique()->toArray());
    }
}

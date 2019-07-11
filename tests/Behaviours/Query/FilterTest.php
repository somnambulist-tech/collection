<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Tests\Behaviours\Query;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;

/**
 * Class FilterTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Query
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Query\FilterTest
 */
class FilterTest extends TestCase
{

    /**
     * @group collection
     */
    public function testFilter()
    {
        $col = new Collection([
            'foo' => 'bar',
            'baz' => 'bar',
            'bob' => 'baz',
        ]);

        $ret = $col->filter(function ($var) {
            return $var == 'baz';
        });

        $this->assertCount(1, $ret);
        $this->assertEquals('bob', $ret->keys()[0]);
    }

}

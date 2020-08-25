<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Tests\Behaviours\Query;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;
use Somnambulist\Collection\Tests\Fixtures\FilterableObject;

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

        $ret = $col->filter(fn ($var) => $var == 'baz');

        $this->assertCount(1, $ret);
        $this->assertEquals('bob', $ret->keys()[0]);
    }

    /**
     * @group collection
     */
    public function testFilterUsingPropertyOrMethod()
    {
        $col = new Collection([
            new FilterableObject('test'),
            new FilterableObject('foo'),
            new FilterableObject('bar'),
            new FilterableObject('foo'),
            new FilterableObject('baz'),
            new FilterableObject('bob'),
        ]);

        $ret = $col->filter('name', 'foo');

        $this->assertCount(2, $ret);
        $this->assertEquals('foo', $ret->first()->getName());
    }

    /**
     * @group collection
     */
    public function testMatching()
    {
        $col = new Collection([
            'foo' => 'bar',
            'baz' => 'bar',
            'bob' => 'baz',
        ]);

        $ret = $col->matching(fn ($var) => $var == 'baz');

        $this->assertCount(1, $ret);
        $this->assertEquals('bob', $ret->keys()[0]);
    }

    /**
     * @group collection
     */
    public function testNotMatching()
    {
        $col = new Collection([
            'foo' => 'bar',
            'baz' => 'bar',
            'bob' => 'baz',
        ]);

        $ret = $col->notMatching(fn ($var) => $var == 'baz');

        $this->assertCount(2, $ret);
        $this->assertEquals('foo', $ret->keys()[0]);
    }
}

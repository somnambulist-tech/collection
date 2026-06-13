<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Query;

use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;
use Somnambulist\Components\Collection\Tests\Fixtures\FilterableObject;

class FilterValuesTest extends TestCase
{

    #[Group("collection")]
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

    #[Group("collection")]
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

    #[Group("collection")]
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

    #[Group("collection")]
    public function testMatchingRule()
    {
        $col = new Collection([
            'foo' => 'bar',
            'baz' => 'bar',
            'bob' => 'baz',
        ]);

        $ret = $col->matchingRule('/foo|baz/');

        $this->assertCount(2, $ret);
        $this->assertArrayNotHasKey('bob', $ret->keys()->toArray());
    }

    #[Group("collection")]
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

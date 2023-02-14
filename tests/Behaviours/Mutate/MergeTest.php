<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Mutate;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

class MergeTest extends TestCase
{

    /**
     * @group merge
     */
    public function testMerge()
    {
        $col = new Collection([
            'foo' => 'bar'
        ]);

        $col->merge(['foo' => 'baz']);

        $this->assertEquals(['foo' => 'baz'], $col->toArray());
    }

    /**
     * @group merge
     */
    public function testMergeCollections()
    {
        $col = new Collection([
            'foo' => 'bar'
        ]);

        $col->merge(new Collection(['foo' => 'baz']));

        $this->assertEquals(['foo' => 'baz'], $col->toArray());
    }

    /**
     * @group merge
     */
    public function testMergeArrayObjects()
    {
        $col = new Collection([
            'foo' => 'bar'
        ]);

        $col->merge(new \ArrayObject(['foo' => 'baz']));

        $this->assertEquals(['foo' => 'baz'], $col->toArray());
    }

    /**
     * @group merge
     */
    public function testMergeNonArraysAreCastToArrays()
    {
        $col = new Collection([
            'foo' => 'bar'
        ]);

        $col->merge('foo');

        $this->assertEquals(['foo' => 'bar', 'foo'], $col->toArray());
    }
}

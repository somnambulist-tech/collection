<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Query;

use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

class FilterKeysTest extends TestCase
{

    #[Group("collection")]
    #[Group("with")]
    public function testOnlyAndWith()
    {
        $col1 = Collection::collect([
            'blue' => 1, 'red' => 2, 'green' => 3, 'purple' => 4, 'black' => 5, 'indigo' => 6, 'yellow' => 7, 'cyan' => 8
        ]);

        $diff = $col1->only('red', 'green', 'blue');

        $this->assertCount(3, $diff);
        $this->assertEquals(['red' => 2, 'green' => 3, 'blue' => 1], $diff->toArray());

        $diff = $col1->with('red', 'green', 'blue');

        $this->assertCount(3, $diff);
        $this->assertEquals(['red' => 2, 'green' => 3, 'blue' => 1], $diff->toArray());
    }

    #[Group("collection")]
    #[Group("with")]
    public function testOnlyWithMixedKeys()
    {
        $col1 = Collection::collect([
            0 => 1, 'red' => 2, 'green' => 3, 'purple' => 4, 'black' => 5, 'indigo' => 6, 'yellow' => 7, 'cyan' => 8
        ]);

        $diff = $col1->only('red', 'green', 'blue');

        $this->assertCount(2, $diff);
        $this->assertEquals(['red' => 2, 'green' => 3], $diff->toArray());
    }

    #[Group("collection")]
    #[Group("without")]
    public function testExcept()
    {
        $col = new Collection(['bar' => 'too', 'baz' => 34, 'bob' => 'example', 'test' => 'case']);
        $this->assertCount(4, $col);

        $col2 = $col->except('baz', 'test');

        $this->assertCount(2, $col2);
        $this->assertArrayHasKey('bar', $col2);
        $this->assertArrayHasKey('bob', $col2);
    }

    #[Group("collection")]
    #[Group("without")]
    public function testWithoutWithMixedKeys()
    {
        $col = new Collection(['bar' => 'too', 0 => 34, 'bob' => 'example', 'test' => 'case']);
        $this->assertCount(4, $col);

        $col2 = $col->except('baz', 'test');

        $this->assertCount(3, $col2);
        $this->assertArrayHasKey('bar', $col2);
        $this->assertArrayHasKey('bob', $col2);
        $this->assertArrayHasKey(0, $col2);
    }
}

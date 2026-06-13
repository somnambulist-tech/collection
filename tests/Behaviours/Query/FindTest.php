<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Query;

use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;
use Somnambulist\Components\Collection\Tests\Fixtures\TestClass4;

class FindTest extends TestCase
{

    #[Group("search")]
    public function testFind()
    {
        $col        = new Collection(new TestClass4());
        $col['bar'] = 'too';

        $this->assertEquals('too', $col->find('too'));
        $this->assertFalse($col->find('baz'));
    }

    #[Group("search")]
    public function testFindWithClosure()
    {
        $col        = new Collection(new TestClass4());
        $col['bar'] = 'too';

        $this->assertEquals('too', $col->find(function ($value, $key) { return 'bar' === $key; }));
    }

    #[Group("search")]
    public function testFindLast()
    {
        $col        = new Collection([
            10, 11, 12, 13, 14, 15,
        ]);

        $this->assertEquals(15, $col->findLast(function ($value, $key) { return $value > 10; }));
    }

    #[Group("search")]
    public function testFindLastReturnsFalseIfNotFound()
    {
        $col        = new Collection([
            10, 11, 12, 13, 14, 15,
        ]);

        $this->assertFalse($col->findLast(function ($value, $key) { return $value < 10; }));
    }
}

<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Query;

use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;
use Somnambulist\Components\Collection\Tests\Fixtures\TestClass4;

class IteratorTest extends TestCase
{

    #[Group("array")]
    public function testIterator()
    {
        $col = new Collection(new TestClass4());
        $col['bar'] = 'too';

        foreach ($col as $key => $value) {

        }

        $this->assertTrue(true);
    }

    #[Group("array")]
    public function testGetIterator()
    {
        $col = new Collection(new TestClass4());
        $col['bar'] = 'too';

        $this->assertInstanceOf(\ArrayIterator::class, $col->getIterator());
    }
}

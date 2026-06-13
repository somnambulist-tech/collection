<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Query;

use OutOfBoundsException;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

class LastTest extends TestCase
{

    #[Group("accessors")]
    public function testLast()
    {
        $col = new Collection([
            'test-1' => 'test',
            'test-2' => null,
            'test-abc' => false,
            'test-abe' => 'test-abc',
        ]);

        $this->assertEquals('test-abc', $col->last());
    }

    #[Group("accessors")]
    public function testLastReturnsNullOnEmpty()
    {
        $this->assertNull((new Collection())->last());
    }

    #[Group("accessors")]
    public function testLastOrFail()
    {
        $this->expectException(OutOfBoundsException::class);

        $this->assertNull((new Collection())->lastOrFail());
    }

    #[Group("accessors")]
    public function testLastWrapsArrays()
    {
        $col = new Collection([
            'ele1' => [
                'test-1' => 'test',
                'test-2' => null,
                'test-abc' => false,
                'test-abe' => 'test',
            ],
            'ele2' => [
                'test-abc' => true,
                'test-1' => 'test',
                'test-abe' => 'test',
                'test-2' => 'foo',
            ],
        ]);

        $this->assertInstanceOf(Collection::class, $col->last());
        $this->assertInstanceOf(Collection::class, $col->get('ele2'));
    }

    #[Group("accessors")]
    public function testLastWrapsArraysWithNumericKeys()
    {
        $col = new Collection([
            [
                'test-1' => 'test',
                'test-2' => null,
                'test-abc' => false,
                'test-abe' => 'test',
            ],
            [
                'test-abc' => true,
                'test-1' => 'test',
                'test-abe' => 'test',
                'test-2' => 'foo',
            ],
        ]);

        $this->assertInstanceOf(Collection::class, $col->last());
        $this->assertInstanceOf(Collection::class, $col->get(1));
    }
}

<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Query;

use OutOfBoundsException;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

class FirstTest extends TestCase
{

    #[Group("accessors")]
    public function testFirst()
    {
        $col = new Collection([
            'test-1' => 'test',
            'test-2' => null,
            'test-abc' => false,
            'test-abe' => 'test',
        ]);

        $this->assertEquals('test', $col->first());
    }

    #[Group("accessors")]
    public function testFirstReturnsNullOnEmpty()
    {
        $this->assertNull((new Collection)->first());
    }

    #[Group("accessors")]
    public function testFirstOrFail()
    {
        $this->expectException(OutOfBoundsException::class);

        $this->assertNull((new Collection)->firstOrFail());
    }

    #[Group("accessors")]
    public function testFirstWrapsArrays()
    {
        $col = new Collection([
            'ele1' => [
                'test-1' => 'test',
                'test-2' => null,
                'test-abc' => false,
                'test-abe' => 'test',
            ],
            'ele2' => [
                'test-1' => 'test',
                'test-2' => null,
                'test-abc' => false,
                'test-abe' => 'test',
            ],
        ]);

        $this->assertInstanceOf(Collection::class, $col->first());
        $this->assertInstanceOf(Collection::class, $col->get('ele1'));
    }

    #[Group("accessors")]
    public function testFirstWrapsArraysWithNumericKeys()
    {
        $col = new Collection([
            [
                'test-1' => 'test',
                'test-2' => null,
                'test-abc' => false,
                'test-abe' => 'test',
            ],
            [
                'test-1' => 'test',
                'test-2' => null,
                'test-abc' => false,
                'test-abe' => 'test',
            ],
        ]);

        $this->assertInstanceOf(Collection::class, $col->first());
        $this->assertInstanceOf(Collection::class, $col->get(0));
    }
}

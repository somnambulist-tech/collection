<?php

namespace Somnambulist\Components\Collection\Tests\Behaviours\Query;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

/**
 * Class FirstTest
 *
 * @package    Somnambulist\Components\Collection\Tests\Behaviours\Query
 * @subpackage Somnambulist\Components\Collection\Tests\Behaviours\Query\FirstTest
 */
class FirstTest extends TestCase
{

    /**
     * @group accessors
     */
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

    /**
     * @group accessors
     */
    public function testFirstReturnsNullOnEmpty()
    {
        $this->assertNull((new Collection)->first());
    }

    /**
     * @group accessors
     */
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

    /**
     * @group accessors
     */
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

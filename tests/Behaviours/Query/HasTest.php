<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Tests\Behaviours\Query;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;

/**
 * Class HasTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Query
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Query\HasTest
 */
class HasTest extends TestCase
{

    /**
     * @group collection
     */
    public function testHas()
    {
        $col = new Collection([
            'test-1' => 'test',
            'test-2' => 'test',
            'test-abc' => 'test',
            'test-abe' => 'test',
        ]);

        $this->assertTrue($col->has('test-abe'));
        $this->assertFalse($col->has('abe'));
    }

    /**
     * @group collection
     */
    public function testHasByInt()
    {
        $col = new Collection([
            'test-1',
            'test-2',
            'test-abc',
            'test-abe',
        ]);

        $this->assertTrue($col->has(3));
        $this->assertFalse($col->has(678));
    }

    /**
     * @group collection
     */
    public function testHasValueFor()
    {
        $col = new Collection([
            'test-1' => 'test',
            'test-2' => null,
            'test-abc' => false,
            'test-abe' => 'test',
        ]);

        $this->assertTrue($col->hasValueFor('test-abe'));
        $this->assertFalse($col->hasValueFor('test-2'));
        $this->assertFalse($col->hasValueFor('test-abc'));
    }
}

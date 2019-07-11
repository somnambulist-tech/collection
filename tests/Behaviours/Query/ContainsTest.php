<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Tests\Behaviours\Query;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;

/**
 * Class ContainsTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Query
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Query\ContainsTest
 */
class ContainsTest extends TestCase
{

    /**
     * @group contains
     */
    public function testContains()
    {
        $col = new Collection([
            'test-1' => 'test',
            'test-2' => null,
            'test-abc' => false,
            'test-abe' => 'test',
        ]);

        $this->assertTrue($col->contains('test'));
        $this->assertFalse($col->contains(1234));
    }
}

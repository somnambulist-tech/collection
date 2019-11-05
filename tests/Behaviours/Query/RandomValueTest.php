<?php

namespace Somnambulist\Collection\Tests\Behaviours\Query;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;

/**
 * Class RandomValueTest
 *
 * @package Somnambulist\Collection\Tests\Behaviours\Query
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Query\RandomValueTest
 */
class RandomValueTest extends TestCase
{

    /**
     * @group random
     */
    public function testAll()
    {
        $col = new Collection([
            'test-1',
            'test-2',
            'test-3',
            'test-4',
            'test-5',
            'test-6',
            'test-7',
            'test-8',
            'test-9',
        ]);

        $this->assertNotNull($col->random());
    }
}

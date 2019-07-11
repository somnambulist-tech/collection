<?php

namespace Somnambulist\Collection\Tests\Behaviours\Query;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;

/**
 * Class FirstTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Query
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Query\FirstTest
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
}

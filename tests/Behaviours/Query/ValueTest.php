<?php

namespace Somnambulist\Collection\Tests\Behaviours\Query;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;

/**
 * Class ValueTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Query
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Query\ValueTest
 */
class ValueTest extends TestCase
{

    /**
     * @group accessors
     */
    public function testValue()
    {
        $col = new Collection([
            'test-1' => 'test',
            'test-2' => 'test',
            'test-abc' => '',
            'test-abe' => null,
        ]);

        $this->assertEquals('test', $col->value('test-1', 'bob'));
        $this->assertEquals('bob', $col->value('test-abc', 'bob'));
        $this->assertEquals('value was null', $col->value('test-abe', function ($value) {
            return is_null($value) ? 'value was null' : 'not null';
        }));
    }
}

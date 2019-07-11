<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Tests\Behaviours\Assertion;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\Exceptions\AssertionFailedException;
use Somnambulist\Collection\MutableCollection as Collection;

/**
 * Class AssertTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Assertion
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Assertion\AssertTest
 */
class AssertTest extends TestCase
{

    /**
     * @group assert
     */
    public function testAssert()
    {
        $col = new Collection(['bar' => 'too', 'baz' => 34, 'bob' => 'example', 'test' => 'case']);
        $this->assertSame($col, $col->assert(function ($item, $key) {
            return !empty($item);
        }));

        $this->expectException(AssertionFailedException::class);
        $col = new Collection(['bar' => 'too', 'baz' => 34, 'bob' => 'example', 'test' => 'case']);
        $col->assert(function ($item, $key) {
            return $key === 'foo';
        });
    }
}

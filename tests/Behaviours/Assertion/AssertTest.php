<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Assertion;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\Exceptions\AssertionFailedException;
use Somnambulist\Components\Collection\MutableCollection as Collection;

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

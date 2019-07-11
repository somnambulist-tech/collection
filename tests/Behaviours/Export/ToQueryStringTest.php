<?php

namespace Somnambulist\Collection\Tests\Behaviours\Export;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;

/**
 * Class ToQueryStringTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Export
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Export\ToQueryStringTest
 */
class ToQueryStringTest extends TestCase
{

    /**
     * @group export
     */
    public function testToQueryString()
    {
        $col = new Collection([
            'foo' => 'bar',
            'bar' => ['baz1', 'baz2'],
            'baz' => true,
        ]);
        $str = $col->toQueryString();

        $this->assertEquals('foo=bar&bar%5B0%5D=baz1&bar%5B1%5D=baz2&baz=1', $str);
    }
}

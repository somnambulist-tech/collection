<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Export;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

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

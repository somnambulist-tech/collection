<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Tests\Behaviours\Map;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;
use function strrev;

/**
 * Class MapTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Map
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Map\MapTest
 */
class MapTest extends TestCase
{

    /**
     * @group collection
     * @group map
     */
    public function testMap()
    {
        $col = new Collection([
            'foo' => 'bar',
            'baz' => 'bar',
            'bob' => 'baz',
        ]);

        $ret = $col->map(function ($var) {
            return $var = 'baz' . $var;
        });

        $this->assertCount(3, $ret);
        foreach ($ret as $key => $value) {
            $this->assertStringContainsString('baz', $value);
        }
    }


    /**
     * @group collection
     * @group map
     */
    public function testMapWithSingleArgFunctions()
    {
        $col = new Collection([
            'foo' => 'bar',
            'baz' => 'bar',
            'bob' => 'baz',
        ]);

        $ret = $col->map(function ($item) { return strrev($item); });

        $this->assertCount(3, $ret);
        foreach ($ret as $key => $value) {
            $this->assertStringContainsString(strrev($value), $col->get($key));
        }
    }

}

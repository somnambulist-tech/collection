<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Map;

use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

class MapIntoTest extends TestCase
{

    #[Group("collection")]
    #[Group("map")]
    public function testMapInto()
    {
        $class = new class { public $value; function __construct($value = '') { $this->value = $value; } };

        $data = new Collection([
            'first', 'second',
        ]);
        $data = $data->mapInto($class::class);

        $this->assertEquals('first', $data[0]->value);
        $this->assertEquals('second', $data[1]->value);
    }
}

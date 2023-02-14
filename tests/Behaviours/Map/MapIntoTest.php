<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Map;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;
use function get_class;

class MapIntoTest extends TestCase
{

    /**
     * @group collection
     * @group map
     */
    public function testMapInto()
    {
        $class = new class { public $value; function __construct($value = '') { $this->value = $value; } };

        $data = new Collection([
            'first', 'second',
        ]);
        $data = $data->mapInto(get_class($class));

        $this->assertEquals('first', $data[0]->value);
        $this->assertEquals('second', $data[1]->value);
    }
}

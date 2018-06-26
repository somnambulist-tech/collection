<?php

namespace Somnambulist\Tests\Collection\Exportable;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\Collection;
use Somnambulist\Collection\Interfaces\ExportableInterface;
use Somnambulist\Collection\Traits\Exportable;

/**
 * Class ExportableTest
 *
 * @package    Somnambulist\Tests\Collection\Exportable
 * @subpackage Somnambulist\Tests\Collection\Exportable\ExportableTest
 */
class ExportableTest extends TestCase
{

    /**
     * @group export
     */
    public function testToArrayOfCollections()
    {
        $col = new Collection([
            'foo' => new Collection([1, 2, 3, 4]),
            'bar' => new Collection([1, 2, 3, 4]),
        ]);
        $arr = $col->toArray();

        $this->assertInternalType('array', $arr);
        $this->assertEquals(['foo' => [1, 2, 3, 4], 'bar' => [1, 2, 3, 4]], $arr);
    }

    /**
     * @group export
     */
    public function testToArrayOfClassImplementingExportable()
    {
        $item = new class implements ExportableInterface {

            use Exportable;

            public function toArray()
            {
                return ['key' => 'value'];
            }
        };

        $this->assertEquals(['key' => 'value'], $item->toArray());
    }

    /**
     * @group export
     */
    public function testToArrayOfCollectionsCascadesToArrayOfExportable()
    {
        $item = new class implements ExportableInterface {

            use Exportable;

            public function toArray()
            {
                return ['key' => 'value'];
            }
        };

        $collection = new Collection([
            'foo' => $item,
            'bar' => new Collection(['item' => $item])
        ]);

        $this->assertEquals(['foo' => ['key' => 'value'], 'bar' => ['item' => ['key' => 'value']]], $collection->toArray());
    }
}

<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Contracts;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\Contracts\Arrayable;
use Somnambulist\Components\Collection\Groups\Exportable;
use Somnambulist\Components\Collection\MutableCollection as Collection;

class ArrayableTest extends TestCase
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

        $this->assertIsArray($arr);
        $this->assertEquals(['foo' => [1, 2, 3, 4], 'bar' => [1, 2, 3, 4]], $arr);
    }

    /**
     * @group export
     */
    public function testToArrayOfClassImplementingExportable()
    {
        $item = new class implements Arrayable {

            use Exportable;

            public function toArray(): array
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
        $item = new class implements Arrayable {

            use Exportable;

            public function toArray(): array
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

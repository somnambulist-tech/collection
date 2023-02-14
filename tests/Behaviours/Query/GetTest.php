<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Query;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

class GetTest extends TestCase
{

    /**
     * @group accessors
     */
    public function testGet()
    {
        $col = new Collection([
            'test-1' => 'test',
            'test-2' => 'test',
            'test-abc' => 'test',
            'test-abe' => 'test',
        ]);

        $this->assertEquals('test', $col->get('test-abe'));
        $this->assertNull($col->get('abe'));
    }

    /**
     * @group accessors
     */
    public function testGetByInt()
    {
        $col = new Collection([
            'test1',
            'test2',
            'test3',
            'test4',
        ]);

        $this->assertEquals('test3', $col->get(2));
        $this->assertNull($col->get(1234));
    }

    /**
     * @group accessors
     */
    public function testGetWithDefaultClosure()
    {
        $col = new Collection([
            'test-1' => 'test',
            'test-2' => 'test',
            'test-abc' => 'test',
            'test-abe' => 'test',
        ]);

        $this->assertEquals('not-here', $col->get('abe', function () { return 'not-here'; }));
    }
}

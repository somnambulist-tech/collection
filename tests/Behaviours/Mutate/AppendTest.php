<?php

namespace Somnambulist\Components\Collection\Tests\Behaviours\Mutate;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;
use Somnambulist\Components\Collection\Tests\Fixtures\TestClass4;

/**
 * Class AppendTest
 *
 * @package    Somnambulist\Components\Collection\Tests\Behaviours\Mutate
 * @subpackage Somnambulist\Components\Collection\Tests\Behaviours\Mutate\AppendTest
 */
class AppendTest extends TestCase
{

    /**
     * @group append
     */
    public function testAppend()
    {
        $col = new Collection();

        $col->append('foo', 'bar', 'baz');
        $this->assertCount(3, $col);

        $this->assertEquals([0, 1, 2], $col->keys()->toArray());
    }

    /**
     * @group append
     */
    public function testAppendCollection()
    {
        $col = new Collection(new TestClass4());
        $col2 = new Collection(['bar' => 'too']);

        $this->assertCount(1, $col);
        $col->append($col2);
        $this->assertCount(2, $col);

        $this->assertSame($col2, $col->get(1));
    }
}

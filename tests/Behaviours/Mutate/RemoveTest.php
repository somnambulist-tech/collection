<?php

declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Mutate;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

/**
 * Class RemoveTest
 *
 * @package    Somnambulist\Components\Collection\Tests\Behaviours\Mutate
 * @subpackage Somnambulist\Components\Collection\Tests\Behaviours\Mutate\RemoveTest
 */
class RemoveTest extends TestCase
{

    /**
     * @group collection
     */
    public function testRemove()
    {
        $col = new Collection();
        $col->set('key', 'value');

        $this->assertTrue($col->has('key'));

        $col->unset('key');

        $this->assertCount(0, $col);
    }

    /**
     * @group collection
     */
    public function testRemoveElement()
    {
        $col = new Collection();
        $col->set('key', 'value');

        $this->assertTrue($col->has('key'));

        $col->remove('value');

        $this->assertCount(0, $col);
    }
}

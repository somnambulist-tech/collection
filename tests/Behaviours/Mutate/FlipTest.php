<?php

declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Mutate;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

/**
 * Class FlipTest
 *
 * @package    Somnambulist\Components\Collection\Tests\Behaviours\Mutate
 * @subpackage Somnambulist\Components\Collection\Tests\Behaviours\Mutate\FlipTest
 */
class FlipTest extends TestCase
{

    /**
     * @group collection
     */
    public function testFlip()
    {
        $col = new Collection([
            'foo', 'bar', 'baz',
        ]);

        $this->assertEquals(['foo' => 0, 'bar' => 1, 'baz' => 2], $col->flip()->toArray());
    }

}

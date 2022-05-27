<?php

declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Mutate;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

/**
 * Class WhenTest
 *
 * @package    Somnambulist\Components\Collection\Tests\Behaviours\Mutate
 * @subpackage Somnambulist\Components\Collection\Tests\Behaviours\Mutate\WhenTest
 */
class WhenTest extends TestCase
{

    /**
     * @group collection
     */
    public function testWhen()
    {
        $col = new Collection([
            'name'    => 'foo',
            'include' => ['this', 'that', 'the', 'other',],
            'order'   => [],
        ]);

        $col
            ->when(
                fn ($col) => $col->get('order')->count() === 0,
                fn ($col) => $col->order->set('field', 'ASC')
            )
        ;

        $this->assertCount(1, $col->get('order'));
    }

    /**
     * @group collection
     */
    public function testWhenHasElse()
    {
        $col = new Collection([
            'name'    => 'foo',
            'include' => ['this', 'that', 'the', 'other',],
            'order'   => ['foobar' => 'ASC'],
        ]);

        $fn = function ($col) { return $col; };

        $col
            ->when(
                fn ($col) => $col->get('order')->only('field')->count() > 0,
                fn ($col) => $fn($col),
                fn ($col) => $col->order->clear()->set('field', 'ASC')
            )
        ;

        $this->assertCount(1, $col->get('order'));
        $this->assertTrue($col->get('order')->has('field'));
        $this->assertTrue($col->get('order')->doesNotHave('foobar'));
    }

    /**
     * @group collection
     */
    public function testWhenWithScalarTest()
    {
        $col = new Collection([
            'name'    => 'foo',
            'include' => ['this', 'that', 'the', 'other',],
            'order'   => ['foobar' => 'ASC'],
        ]);

        $col
            ->when(
                true,
                fn ($col) => $col->order->clear()->set('field', 'ASC')
            )
        ;

        $this->assertCount(1, $col->get('order'));
        $this->assertTrue($col->get('order')->has('field'));
        $this->assertTrue($col->get('order')->doesNotHave('foobar'));
    }

    /**
     * @group collection
     */
    public function testWhenReturnsInitialCollection()
    {
        $col = new Collection([
            'name'    => 'foo',
            'include' => ['this', 'that', 'the', 'other',],
            'order'   => ['foobar' => 'ASC'],
        ]);

        $ret = $col
            ->when(
                true,
                fn ($col) => $col->order->clear()->set('field', 'ASC')
            )
        ;

        $this->assertSame($col, $ret);
    }
}

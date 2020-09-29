<?php

declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Query;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

/**
 * Class ValuesTest
 *
 * @package    Somnambulist\Components\Collection\Tests\Behaviours\Query
 * @subpackage Somnambulist\Components\Collection\Tests\Behaviours\Query\ValuesTest
 */
class ValuesTest extends TestCase
{

    /**
     * @group collection
     */
    public function testValues()
    {
        $col = new Collection([
            'bar' => 'baz',
            'baz' => 'foo',
            'foobar' => 'baz',
        ]);

        $this->assertEquals(['baz', 'foo', 'baz'], $col->values()->toArray());
    }
}

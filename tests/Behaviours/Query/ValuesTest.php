<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Tests\Behaviours\Query;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;

/**
 * Class ValuesTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Query
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Query\ValuesTest
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

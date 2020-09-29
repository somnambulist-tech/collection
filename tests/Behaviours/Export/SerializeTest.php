<?php

declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Export;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;
use Somnambulist\Components\Collection\Tests\Fixtures\TestClass4;
use function serialize;
use function unserialize;

/**
 * Class SerializeTest
 *
 * @package    Somnambulist\Components\Collection\Tests\Behaviours\Export
 * @subpackage Somnambulist\Components\Collection\Tests\Behaviours\Export\SerializeTest
 */
class SerializeTest extends TestCase
{

    /**
     * @group serialize
     */
    public function testSerialize()
    {
        $col = new Collection(new TestClass4());
        $col['bar'] = 'too';

        $tmp = serialize($col);
        $col = unserialize($tmp);

        $this->assertInstanceOf(Collection::class, $col);
        $this->assertCount(2, $col);
    }

}

<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Tests\Behaviours\Export;

use PHPUnit\Framework\TestCase;
use function serialize;
use Somnambulist\Collection\MutableCollection as Collection;
use Somnambulist\Collection\Tests\Fixtures\TestClass4;
use function unserialize;

/**
 * Class SerializeTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Export
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Export\SerializeTest
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

<?php

declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Mutate;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

/**
 * Class SetTest
 *
 * @package    Somnambulist\Components\Collection\Tests\Behaviours\Mutate
 * @subpackage Somnambulist\Components\Collection\Tests\Behaviours\Mutate\SetTest
 */
class SetTest extends TestCase
{

    /**
     * @group collection
     * @group set
     */
    public function testSet()
    {
        $col = new Collection();
        $col->set('key', 'value');

        $this->assertTrue($col->has('key'));
        $this->assertEquals('value', $col->get('key'));
    }

}

<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Tests\Behaviours\Mutate;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;

/**
 * Class SetTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Mutate
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Mutate\SetTest
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

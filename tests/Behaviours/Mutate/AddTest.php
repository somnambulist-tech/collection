<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Tests\Behaviours\Mutate;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;

/**
 * Class AddTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Mutate
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Mutate\AddTest
 */
class AddTest extends TestCase
{

    /**
     * @group collection
     */
    public function testAdd()
    {
        $col = new Collection();
        $col->add('value')->add('value2');

        $this->assertCount(2, $col);
    }

    /**
     * @group collection
     */
    public function testAddDoesAllowDuplicateValues()
    {
        $col = new Collection();
        $col->add('value')->add('value')->add('value');

        $this->assertCount(3, $col);
    }
}

<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Mutate;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

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

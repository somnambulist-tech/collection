<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Strings;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

class CapitalizeTest extends TestCase
{

    /**
     * @group capitalize
     */
    public function testCapitalize()
    {
        $col = Collection::collect(['foo_bar', 'foo bar', 'baz']);

        $this->assertCount(3, $col);

        $col = $col->capitalize();

        $this->assertContains('Foo_Bar', $col);
        $this->assertContains('Foo Bar', $col);
        $this->assertContains('Baz', $col);
    }
}

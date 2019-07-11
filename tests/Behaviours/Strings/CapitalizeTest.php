<?php

namespace Somnambulist\Collection\Tests\Behaviours\Strings;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;

/**
 * Class CapitalizeTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Strings
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Strings\CapitalizeTest
 */
class CapitalizeTest extends TestCase
{

    /**
     * @group text
     */
    public function testCapitalize()
    {
        $col = Collection::collect(['foo_bar', 'foo bar', 'baz']);

        $this->assertCount(3, $col);

        $col = $col->capitalize();

        $this->assertContains('Foo_bar', $col);
        $this->assertContains('Foo Bar', $col);
        $this->assertContains('Baz', $col);
    }
}

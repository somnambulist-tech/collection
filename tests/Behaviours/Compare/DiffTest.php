<?php

declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Compare;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;
use function strcmp;

/**
 * Class DiffTest
 *
 * @package    Somnambulist\Components\Collection\Tests\Behaviours\Compare
 * @subpackage Somnambulist\Components\Collection\Tests\Behaviours\Compare\DiffTest
 */
class DiffTest extends TestCase
{

    /**
     * @group diff
     */
    public function testDiff()
    {
        $col1 = Collection::collect(["a" => "green", "red", "blue", "red"]);
        $col2 = Collection::collect(["b" => "green", "yellow", "red"]);

        $diff = $col1->diff($col2);

        $this->assertCount(1, $diff);
        $this->assertContains('blue', $diff);
    }

    /**
     * @group diff
     */
    public function testDiffKeys()
    {
        $col1 = Collection::collect(['blue' => 1, 'red' => 2, 'green' => 3, 'purple' => 4]);
        $col2 = Collection::collect(['green' => 5, 'blue' => 6, 'yellow' => 7, 'cyan' => 8]);

        $diff = $col1->diffKeys($col2);

        $this->assertCount(2, $diff);
        $this->assertArrayHasKey('red', $diff);
        $this->assertArrayHasKey('purple', $diff);
    }

    /**
     * @group diff
     */
    public function testDiffKeysUsing()
    {
        $col1 = Collection::collect(['blue' => 1, 'red' => 2, 'green' => 3, 'purple' => 4]);
        $col2 = Collection::collect(['green' => 5, 'blue' => 6, 'yellow' => 7, 'cyan' => 8]);

        $diff = $col1->diffKeysUsing($col2, fn ($a, $b) => strcmp($a, $b));

        $this->assertCount(2, $diff);
        $this->assertArrayHasKey('red', $diff);
        $this->assertArrayHasKey('purple', $diff);
    }
}

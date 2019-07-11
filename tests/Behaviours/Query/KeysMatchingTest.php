<?php

namespace Somnambulist\Collection\Tests\Behaviours\Query;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;

/**
 * Class KeysMatchingTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Query
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Query\KeysMatchingTest
 */
class KeysMatchingTest extends TestCase
{

    /**
     * @group search
     */
    public function testKeysMatching()
    {
        $col = new Collection([
            'test-1' => 'test',
            'test-2' => 'test',
            'test-abc' => 'test',
            'test-abe' => 'test',
            'test-abf' => 'test',
            'test-3' => 'test',
            'test-4' => 'test',
            'test-10' => 'test',
            'test-zad' => 'test',
        ]);

        $this->assertCount(9, $col);

        $tmp = $col->keysMatching('/^test-\d+/')->toArray();

        $this->assertCount(5, $tmp);
    }
}

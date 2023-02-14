<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Query;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

class AllTest extends TestCase
{

    /**
     * @group accessors
     */
    public function testAll()
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

        $this->assertIsArray($col->all());
    }
}

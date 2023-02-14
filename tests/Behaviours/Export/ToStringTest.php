<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Export;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

class ToStringTest extends TestCase
{

    /**
     * @group collection
     * @group implode
     */
    public function testImplode()
    {
        $col = new Collection([
            'test-1' => 'test',
            'test-2' => null,
            'test-abc' => false,
            'test-abe' => 'test-abc',
        ]);

        $this->assertEquals('test|||test-abc', $col->implode('|', null));
    }

    /**
     * @group collection
     * @group implode
     */
    public function testImplodeKeysAndValues()
    {
        $col = new Collection([
            'test-1' => 'test',
            'test-2' => null,
            'test-abc' => false,
            'test-abe' => 'test-abc',
        ]);

        $this->assertEquals('test-1=test|test-2=|test-abc=|test-abe=test-abc', $col->implode('|', null, '='));
    }

    /**
     * @group collection
     * @group implode
     */
    public function testImplodeKeys()
    {
        $col = new Collection([
            'test-1' => 'test',
            'test-2' => null,
            'test-abc' => false,
            'test-abe' => 'test-abc',
        ]);

        $this->assertEquals('test-1|test-2|test-abc|test-abe', $col->keys()->implode('|', null));
    }
}

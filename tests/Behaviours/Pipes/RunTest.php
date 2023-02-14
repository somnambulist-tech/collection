<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Pipes;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

class RunTest extends TestCase
{

    /**
     * @group collection
     * @group run
     */
    public function testRun()
    {
        $col = new Collection([
            new Collection([
                'foo' => 'bar',
            ]),
            new Collection([
                'foo' => 'bar',
            ]),
            new Collection([
                'foo' => 'bar',
            ]),
        ]);

        $ret = $col->run('set', 'foo', 'baz');

        foreach ($ret as $col) {
            /** @var Collection $col */
            $this->assertEquals('baz', $col->get('foo'));
        }
    }

    /**
     * @group collection
     * @group run
     */
    public function testRunWithSingleArg()
    {
        $col = new Collection([
            new Collection([
                'foo' => 'bar',
            ]),
            new Collection([
                'foo' => 'bar',
            ]),
            new Collection([
                'foo' => 'bar',
            ]),
        ]);

        $ret = $col->run('unset', 'foo');

        foreach ($ret as $col) {
            $this->assertCount(0, $col);
        }
    }
}

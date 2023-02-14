<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Pipes;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;
use Somnambulist\Components\Collection\Tests\Fixtures\TestClass4;

class MagicRunTest extends TestCase
{

    /**
     * @group magic
     */
    public function testCallMethodDirectly()
    {
        $mock1 = $this->createMock(TestClass4::class);
        $mock1
            ->expects($this->once())
            ->method('asJson')
        ;

        $col = new Collection([
            'bar' => $mock1,
        ]);

        $col->run->asJson();
    }
}

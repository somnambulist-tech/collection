<?php

namespace Somnambulist\Collection\Tests\Behaviours\Pipes;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;
use Somnambulist\Collection\Tests\Fixtures\TestClass4;

/**
 * Class MagicRunTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Pipes
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Pipes\MagicRunTest
 */
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

<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Utils;

use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\Tests\Fixtures\ObjectWithMagicProperties;
use Somnambulist\Components\Collection\Utils\ClassUtils;

class ClassUtilsTest extends TestCase
{

    #[Group("virtual-properties")]
    #[Group("has-property")]
    public function testCanGetPropertyNameFromMagicProps()
    {
        $obj = new ObjectWithMagicProperties(['foo' => 'bar', 'baz' => null]);

        $this->assertEquals('foo', ClassUtils::getPropertyNameIn($obj, 'foo'));
        $this->assertEquals('baz', ClassUtils::getPropertyNameIn($obj, 'baz'));
        $this->assertNull(ClassUtils::getPropertyNameIn($obj, 'test_bar'));
    }

    #[Group("virtual-properties")]
    #[Group("has-property")]
    public function testCanCheckForMagicProperties()
    {
        $obj = new ObjectWithMagicProperties(['foo' => 'bar', 'baz' => null]);

        $this->assertTrue(ClassUtils::hasProperty($obj, 'foo'));
        $this->assertTrue(ClassUtils::hasProperty($obj, 'baz'));
        $this->assertFalse(ClassUtils::hasProperty($obj, 'test_bar'));
    }
}

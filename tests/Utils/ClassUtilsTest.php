<?php

declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Utils;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\Tests\Fixtures\ObjectWithMagicProperties;
use Somnambulist\Components\Collection\Utils\ClassUtils;

/**
 * Class ValueTest
 *
 * @package    Somnambulist\Components\Collection\Tests\Utils
 * @subpackage Somnambulist\Components\Collection\Tests\Utils\ValueTest
 */
class ClassUtilsTest extends TestCase
{

    /**
     * @group virtual-properties
     * @group has-property
     */
    public function testCanGetPropertyNameFromMagicProps()
    {
        $obj = new ObjectWithMagicProperties(['foo' => 'bar', 'baz' => null]);

        $this->assertEquals('foo', ClassUtils::getPropertyNameIn($obj, 'foo'));
        $this->assertEquals('baz', ClassUtils::getPropertyNameIn($obj, 'baz'));
        $this->assertNull(ClassUtils::getPropertyNameIn($obj, 'test_bar'));
    }

    /**
     * @group virtual-properties
     * @group has-property
     */
    public function testCanCheckForMagicProperties()
    {
        $obj = new ObjectWithMagicProperties(['foo' => 'bar', 'baz' => null]);

        $this->assertTrue(ClassUtils::hasProperty($obj, 'foo'));
        $this->assertTrue(ClassUtils::hasProperty($obj, 'baz'));
        $this->assertFalse(ClassUtils::hasProperty($obj, 'test_bar'));
    }
}

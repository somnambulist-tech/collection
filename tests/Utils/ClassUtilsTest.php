<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Tests\Utils;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\Tests\Fixtures\ObjectWithMagicProperties;
use Somnambulist\Collection\Utils\ClassUtils;

/**
 * Class ValueTest
 *
 * @package    Somnambulist\Collection\Tests\Utils
 * @subpackage Somnambulist\Collection\Tests\Utils\ValueTest
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

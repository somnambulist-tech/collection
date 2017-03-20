<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

namespace Somnambulist\Tests\Collection;

use Somnambulist\Collection\Immutable;

/**
 * Class ImmutableTest
 *
 * @package    Somnambulist\Tests\Collection
 * @subpackage Somnambulist\Tests\Collection\ImmutableTest
 */
class ImmutableTest extends \PHPUnit_Framework_TestCase
{

    public function testCanSerialize()
    {
        $col = new Immutable([new TestClass4(), 'bar' => 'foo']);

        $tmp = serialize($col);
        $col = unserialize($tmp);

        $this->assertInstanceOf(Immutable::class, $col);
        $this->assertCount(2, $col);
    }

    public function testCanRestoreState()
    {
        $col  = new Immutable(new TestClass4());
        $test = var_export($col, true);

        eval('$col2 = ' . $test . ';');

        $this->assertInstanceOf(Immutable::class, $col2);
        $this->assertCount(1, $col2);
        $this->assertFalse($col2->isModified());
    }

    public function testCannotSetValueByArrayAccess()
    {
        $col = new Immutable();

        $this->expectException(\RuntimeException::class);
        $col['foo'] = 'bar';
    }

    public function testCannotSetValueByMagicSet()
    {
        $col = new Immutable();

        $this->expectException(\RuntimeException::class);
        $col->foo = 'bar';
    }

    public function testCannotResetCollection()
    {
        $col = new Immutable();

        $this->expectException(\RuntimeException::class);
        $col->reset();
    }

    public function testCannotUnsetByArrayAccess()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->expectException(\RuntimeException::class);
        unset($col['foo']);
    }

    public function testCannotUnsetByMagicUnset()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->expectException(\RuntimeException::class);
        unset($col->foo);
    }

    public function testCallingFreezeReturnsSelf()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->assertSame($col, $col->freeze());
    }

    public function testCannotAppend()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->expectException(\RuntimeException::class);
        $col->append(['bar' => 'baz']);
    }

    public function testCannotMerge()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->expectException(\RuntimeException::class);
        $col->merge(['bar' => 'baz']);
    }

    public function testCannotPad()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->expectException(\RuntimeException::class);
        $col->pad(10, 'bar');
    }

    public function testCannotPop()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->expectException(\RuntimeException::class);
        $col->pop();
    }

    public function testCannotReverse()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->expectException(\RuntimeException::class);
        $col->reverse();
    }

    public function testCannotShift()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->expectException(\RuntimeException::class);
        $col->shift();
    }

    public function testCannotSortByKey()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->expectException(\RuntimeException::class);
        $col->sortByKey();
    }

    public function testCannotSortByKeyReversed()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->expectException(\RuntimeException::class);
        $col->sortByKeyReversed();
    }

    public function testCannotSortByValue()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->expectException(\RuntimeException::class);
        $col->sortByValue();
    }

    public function testCannotSortByValueReversed()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->expectException(\RuntimeException::class);
        $col->sortByValueReversed();
    }

    public function testCannotSortUsing()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->expectException(\RuntimeException::class);
        $col->sortUsing(function () {});
    }

    public function testCannotSortKeepingKeysUsing()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->expectException(\RuntimeException::class);
        $col->sortKeepingKeysUsing(function () {});
    }

    public function testCannotAdd()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->expectException(\RuntimeException::class);
        $col->add('bar');
    }

    public function testCannotAddIfNotInSet()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->expectException(\RuntimeException::class);
        $col->addIfNotInSet('bar');
    }

    public function testCannotSet()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->expectException(\RuntimeException::class);
        $col->set('bar', 'baz');
    }

    public function testCannotRemove()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->expectException(\RuntimeException::class);
        $col->remove('foo');
    }
}

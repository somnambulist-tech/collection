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

namespace Somnambulist\Collection;

/**
 * Class Immutable
 *
 * @package    Somnambulist\Collection
 * @subpackage Somnambulist\Collection\Immutable
 * @author     Dave Redfern
 */
class Immutable extends Collection
{

    /**
     * Set a property $name to $value
     *
     * @param string $name
     * @param mixed  $value
     *
     * @return $this
     */
    public function __set($name, $value)
    {
        throw new \RuntimeException('Collection is immutable');
    }

    /**
     * Removes property $name
     *
     * @param string $name
     */
    public function __unset($name)
    {
        throw new \RuntimeException('Collection is immutable');
    }

    /**
     * @throws \RuntimeException
     */
    public function reset()
    {
        throw new \RuntimeException('Collection is immutable');
    }

    /**
     * @param string $offset
     * @param mixed  $value
     *
     * @return mixed
     */
    public function offsetSet($offset, $value)
    {
        throw new \RuntimeException('Collection is immutable');
    }

    /**
     * @param string $offset
     */
    public function offsetUnset($offset)
    {
        throw new \RuntimeException('Collection is immutable');
    }



    /**
     * @throws \RuntimeException
     */
    public function append($array)
    {
        throw new \RuntimeException('Collection is immutable');
    }

    /**
     * @return $this
     */
    public function freeze()
    {
        return $this;
    }

    /**
     * @throws \RuntimeException
     */
    public function merge($array)
    {
        throw new \RuntimeException('Collection is immutable');
    }

    /**
     * @throws \RuntimeException
     */
    public function pad($size, $value)
    {
        throw new \RuntimeException('Collection is immutable');
    }

    /**
     * @throws \RuntimeException
     */
    public function pop()
    {
        throw new \RuntimeException('Collection is immutable');
    }

    /**
     * @throws \RuntimeException
     */
    public function reverse()
    {
        throw new \RuntimeException('Collection is immutable');
    }

    /**
     * @throws \RuntimeException
     */
    public function shift()
    {
        throw new \RuntimeException('Collection is immutable');
    }

    /**
     * @throws \RuntimeException
     */
    public function sortByValue($type = SORT_STRING)
    {
        throw new \RuntimeException('Collection is immutable');
    }

    /**
     * @throws \RuntimeException
     */
    public function sortByKey($type = null)
    {
        throw new \RuntimeException('Collection is immutable');
    }

    /**
     * @throws \RuntimeException
     */
    public function sortByValueReversed($type = SORT_STRING)
    {
        throw new \RuntimeException('Collection is immutable');
    }

    /**
     * @throws \RuntimeException
     */
    public function sortByKeyReversed($type = SORT_STRING)
    {
        throw new \RuntimeException('Collection is immutable');
    }

    /**
     * @throws \RuntimeException
     */
    public function sortUsing($callable)
    {
        throw new \RuntimeException('Collection is immutable');
    }

    /**
     * @throws \RuntimeException
     */
    public function sortKeepingKeysUsing($callable)
    {
        throw new \RuntimeException('Collection is immutable');
    }



    /**
     * @throws \RuntimeException
     */
    public function add($value)
    {
        throw new \RuntimeException('Collection is immutable');
    }

    /**
     * @throws \RuntimeException
     */
    public function set($key, $value = null)
    {
        throw new \RuntimeException('Collection is immutable');
    }

    /**
     * @throws \RuntimeException
     */
    public function remove($key)
    {
        throw new \RuntimeException('Collection is immutable');
    }
}

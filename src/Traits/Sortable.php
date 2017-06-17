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

namespace Somnambulist\Collection\Traits;

/**
 * Class Sorting
 *
 * @package    Somnambulist\Collection\Traits
 * @subpackage Somnambulist\Collection\Traits\Sorting
 *
 * @property array $items
 */
trait Sortable
{

    /**
     * Sort the Collection by a user defined function
     *
     * @link http://ca.php.net/usort
     *
     * @param mixed $callable Any valid PHP callable e.g. function, closure, method
     *
     * @return $this
     */
    public function sortUsing($callable)
    {
        \usort($this->items, $callable);

        return $this;
    }

    /**
     * Sort the Collection by a user defined function
     *
     * @link http://ca.php.net/uasort
     *
     * @param mixed $callable Any valid PHP callable e.g. function, closure, method
     *
     * @return $this
     */
    public function sortKeepingKeysUsing($callable)
    {
        \uasort($this->items, $callable);

        return $this;
    }

    /**
     * Sorts the Collection by value using asort preserving keys, returns the Collection
     *
     * @link http://ca.php.net/asort
     *
     * @param integer $type Any valid SORT_ constant
     *
     * @return $this
     */
    public function sortByValue($type = SORT_STRING)
    {
        \asort($this->items, $type);

        return $this;
    }

    /**
     * Sorts the Collection by value using arsort preserving keys, returns the Collection
     *
     * @link http://ca.php.net/arsort
     *
     * @param integer $type Any valid SORT_ constant
     *
     * @return $this
     */
    public function sortByValueReversed($type = SORT_STRING)
    {
        \arsort($this->items, $type);

        return $this;
    }

    /**
     * Sort the Collection by designated keys
     *
     * @link http://ca.php.net/ksort
     *
     * @param null|integer $type Any valid SORT_ constant
     *
     * @return $this
     */
    public function sortByKey($type = null)
    {
        \ksort($this->items, $type);

        return $this;
    }

    /**
     * Sort the Collection by designated keys in reverse order
     *
     * @link http://ca.php.net/krsort
     *
     * @param null|integer $type Any valid SORT_ constant
     *
     * @return $this
     */
    public function sortByKeyReversed($type = null)
    {
        \krsort($this->items, $type);

        return $this;
    }
}

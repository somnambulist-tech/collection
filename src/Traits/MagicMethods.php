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
 * Trait MagicMethods
 *
 * @package    Somnambulist\Collection\Traits
 * @subpackage Somnambulist\Collection\Traits\MagicMethods
 */
trait MagicMethods
{

    /**
     * Implementation of __set_state to allow var_export Collection to be used
     *
     * @param array $array
     *
     * @return $this
     * @static
     */
    public static function __set_state($array)
    {
        $oObject        = new static();
        $oObject->items = $array['items'];

        return $oObject;
    }

    /**
     * Allows method names on sub-objects to be called on the Collection
     *
     * Calls into {@link invoke} to actually run the method.
     *
     * @param string $name
     * @param array  $arguments
     *
     * @return $this
     */
    public function __call($name, $arguments)
    {
        return $this->invoke($name, $arguments);
    }

    /**
     * Returns true if property exists (array key)
     *
     * @param string $name
     *
     * @return boolean
     */
    public function __isset($name)
    {
        return $this->offsetExists($name);
    }

    /**
     * Returns the property matching $name
     *
     * @param string $name
     *
     * @return mixed
     */
    public function __get($name)
    {
        return $this->offsetGet($name);
    }

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
        $this->offsetSet($name, $value);

        return $this;
    }

    /**
     * Removes property $name
     *
     * @param string $name
     */
    public function __unset($name)
    {
        $this->offsetUnset($name);
    }
}

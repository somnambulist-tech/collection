<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Exceptions;

use Exception;
use function get_class;
use function gettype;
use function is_object;
use function sprintf;

/**
 * Class AssertionFailedException
 *
 * @package    Somnambulist\Components\Collection\Exceptions
 * @subpackage Somnambulist\Components\Collection\Exceptions\AssertionFailedException
 */
class AssertionFailedException extends Exception
{

    /**
     * @var mixed
     */
    private $key;

    /**
     * @var mixed
     */
    private $value;

    /**
     * Constructor.
     *
     * @param mixed $value
     * @param mixed $key
     */
    public function __construct($value, $key)
    {
        $this->key   = $key;
        $this->value = $value;

        parent::__construct(
            sprintf(
                'Assertion failed for key "%s" with value type "%s"', $key,
                is_object($value) ? get_class($value) : gettype($value)
            )
        );
    }

    public static function assertionFailedFor($value, $key)
    {
        return new self($value, $key);
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}

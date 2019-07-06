<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Exceptions;

use Exception;

/**
 * Class AssertionFailedException
 *
 * @package    Somnambulist\Collection\Exceptions
 * @subpackage Somnambulist\Collection\Exceptions\AssertionFailedException
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
     * @param mixed $key
     * @param mixed $value
     */
    public function __construct($key, $value)
    {
        $this->key   = $key;
        $this->value = $value;

        parent::__construct(sprintf('Assertion failed for key "%s" with value type "%s"', $key, gettype($value)));
    }

    public static function assertionFailedFor($key, $value)
    {
        return new static($key, $value);
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

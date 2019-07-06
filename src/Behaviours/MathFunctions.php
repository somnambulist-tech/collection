<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

use function arsort;
use function is_null;
use function key;
use function reset;
use Somnambulist\Collection\Utils\Value;

/**
 * Trait MathFunctions
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\MathFunctions
 */
trait MathFunctions
{

    /**
     * Returns the average of all values from the collection using the key
     *
     * @param null|string|callable $key
     *
     * @return float|int
     */
    public function average($key = null)
    {
        $sum = $this->sum($key);

        return $sum == 0 ? 0 : ($sum/$this->count());
    }

    /**
     * Returns the highest value from the collection of values
     *
     * Key can be a string key or callable. Based on Laravel: Illuminate\Support\Collection.max
     *
     * @param null|string|callable $key
     *
     * @return float|int
     */
    public function max($key = null)
    {
        $callback = Value::accessor($key);

        return $this
            ->filter(function ($value) {
                return !is_null($value);
            })
            ->reduce(function ($result, $item) use ($callback) {
                $value = $callback($item);

                return is_null($result) || $value > $result ? $value : $result;
            })
        ;
    }

    /**
     * Returns the median value of the min/max from the key
     *
     * @param null|string|callable $key
     *
     * @return float|int
     */
    public function median($key = null)
    {
        $min = $this->min($key);
        $max = $this->max($key);

        return ($min + $max) == 0 ? 0 : (($min + $max) / 2);
    }

    /**
     * Returns the modal (most frequent) value from the collection based on the key
     *
     * @param null|string|callable $key
     *
     * @return float|int
     */
    public function modal($key = null)
    {
        $callback = Value::accessor($key);

        $tally = [];

        foreach ($this->items as $key => $value) {
            $valueToCount = $callback($value);

            $tally[$valueToCount]++;
        }

        arsort($tally, SORT_NUMERIC);
        reset($tally);

        return key($tally);
    }

    /**
     * Returns the lowest value from the collection of values
     *
     * Key can be a string key or callable. Based on Laravel: Illuminate\Support\Collection.min
     *
     * @param null|string|callable $key
     *
     * @return float|int
     */
    public function min($key = null)
    {
        $callback = Value::accessor($key);

        return $this
            ->filter(function ($value) {
                return !is_null($value);
            })
            ->reduce(function ($result, $item) use ($callback) {
                $value = $callback($item);

                return is_null($result) || $value < $result ? $value : $result;
            })
        ;
    }

    /**
     * Sum items in the collection, optionally matching the key / callable
     *
     * Based on Laravel: Illuminate\Support\Collection.sum
     *
     * @param null|string|callable $key
     *
     * @return float|int
     */
    public function sum($key = null)
    {
        $callback = Value::accessor($key);

        return $this->reduce(function ($result, $item) use ($callback) {
            return $result + $callback($item);
        }, 0);
    }
}

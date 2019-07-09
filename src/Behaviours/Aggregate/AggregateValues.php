<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Aggregate;

use Somnambulist\Collection\Utils\Value;
use function array_keys;
use function array_count_values;
use function arsort;
use function count;
use function current;
use function is_null;

/**
 * Trait AggregateValues
 *
 * @package    Somnambulist\Collection\Behaviours\Aggregate
 * @subpackage Somnambulist\Collection\Behaviours\Aggregate\AggregateValues
 *
 * @property array $items
 */
trait AggregateValues
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
     * Returns the modal (most frequent) value from the collection based on the key
     *
     * In the case of a single modal, returns that value (int/float).
     * In the case of several modals, returns an array of each value
     * If every value is a modal, returns false.
     *
     * If you have many modals, consider grouping by occurrence instead.
     *
     * @link https://cowburn.info/2009/04/01/php-array-mode/
     *
     * @param null|string|callable $key
     *
     * @return mixed
     */
    public function modal($key = null)
    {
        $callback = Value::accessor($key);

        $values = [];

        foreach ($this->items as $key => $value) {
            $values[] = $callback($value);
        }

        $counts = array_count_values($values);
        arsort($counts);
        $modes = array_keys($counts, current($counts), true);

        if (count($values) === count($counts)) {
            return false;
        }

        if (count($modes) === 1) {
            return $modes[0];
        }

        return $modes;
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

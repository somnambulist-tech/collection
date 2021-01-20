<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Aggregate;

use Somnambulist\Components\Collection\Utils\Value;
use function array_count_values;
use function array_keys;
use function arsort;
use function count;
use function current;
use function is_null;

/**
 * Trait AggregateValues
 *
 * @package    Somnambulist\Components\Collection\Behaviours\Aggregate
 * @subpackage Somnambulist\Components\Collection\Behaviours\Aggregate\AggregateValues
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
    public function average(string|callable $key = null): float|int
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
     * @return mixed int/float or an array of the key => value that is the max value
     */
    public function max(string|callable $key = null): mixed
    {
        $callback = Value::accessor($key);

        return $this
            ->filter(fn ($value) => !is_null($value))
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
    public function median(string|callable $key = null): float|int
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
     * @return mixed int/float or an array of the key => value that is the min value
     */
    public function min(string|callable $key = null): mixed
    {
        $callback = Value::accessor($key);

        return $this
            ->filter(fn ($value) => !is_null($value))
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
     * @return mixed int/float or an array of the key => value that are the modal values
     */
    public function modal(string|callable $key = null): mixed
    {
        $callback = Value::accessor($key);

        $items = [];

        foreach ($this->items as $key => $value) {
            $items[] = $callback($value);
        }

        $counts = array_count_values($items);
        arsort($counts);
        $modes = array_keys($counts, current($counts), true);

        if (count($items) === count($counts)) {
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
    public function sum(string|callable $key = null): float|int
    {
        $callback = Value::accessor($key);

        return $this->reduce(fn ($result, $item) => $result + $callback($item), 0);
    }
}

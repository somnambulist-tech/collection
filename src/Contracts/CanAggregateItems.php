<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Contracts;

/**
 * Interface CanAggregateItems
 *
 * @package    Somnambulist\Components\Collection\Contracts
 * @subpackage Somnambulist\Components\Collection\Contracts\CanAggregateItems
 */
interface CanAggregateItems
{

    /**
     * @param null|string|callable $key
     *
     * @return float|int
     */
    public function average($key = null);

    /**
     * @param null|string|callable $key
     *
     * @return float|int
     */
    public function max($key = null);

    /**
     * @param null|string|callable $key
     *
     * @return float|int
     */
    public function median($key = null);

    /**
     * @param null|string|callable $key
     *
     * @return float|int
     */
    public function min($key = null);

    /**
     * @param null|string|callable $key
     *
     * @return float|int
     */
    public function modal($key = null);

    /**
     * @param null|string|callable $key
     *
     * @return float|int
     */
    public function sum($key = null);
}

<?php declare(strict_types=1);

namespace Somnambulist\Collection\Tests\Fixtures;

/**
 * Class ProductId
 *
 * @package    Somnambulist\Collection\Tests\Fixtures
 * @subpackage Somnambulist\Collection\Tests\Fixtures\ProductId
 */
class ProductId
{

    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function __toString()
    {
        return (string)$this->id;
    }

    public function getId()
    {
        return $this->id;
    }
}

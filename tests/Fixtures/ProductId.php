<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Fixtures;

/**
 * Class ProductId
 *
 * @package    Somnambulist\Components\Collection\Tests\Fixtures
 * @subpackage Somnambulist\Components\Collection\Tests\Fixtures\ProductId
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

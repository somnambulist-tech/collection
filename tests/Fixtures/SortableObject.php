<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Fixtures;

/**
 * Class SortableObject
 *
 * @package    Somnambulist\Components\Collection\Tests\Fixtures
 * @subpackage Somnambulist\Components\Collection\Tests\Fixtures\SortableObject
 */
class SortableObject
{

    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

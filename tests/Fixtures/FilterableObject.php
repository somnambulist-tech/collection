<?php declare(strict_types=1);

namespace Somnambulist\Collection\Tests\Fixtures;

/**
 * Class FilterableObject
 *
 * @package    Somnambulist\Collection\Tests\Fixtures
 * @subpackage Somnambulist\Collection\Tests\Fixtures\FilterableObject
 */
class FilterableObject
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

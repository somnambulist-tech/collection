<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Fixtures;

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

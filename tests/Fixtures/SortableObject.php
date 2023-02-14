<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Fixtures;

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

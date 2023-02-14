<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Groups;

use Somnambulist\Components\Collection\Behaviours\Query\FilterByKey;
use Somnambulist\Components\Collection\Behaviours\Query\FilterValues;

trait Filterable
{

    use FilterValues;
    use FilterByKey;

}

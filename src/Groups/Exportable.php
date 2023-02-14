<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Groups;

use Somnambulist\Components\Collection\Behaviours\Export\ExportToArray;
use Somnambulist\Components\Collection\Behaviours\Export\ExportToJson;
use Somnambulist\Components\Collection\Behaviours\Export\ExportToQueryString;
use Somnambulist\Components\Collection\Behaviours\Export\ExportToString;
use Somnambulist\Components\Collection\Behaviours\Export\JsonSerialize;
use Somnambulist\Components\Collection\Behaviours\Export\Serializable;

trait Exportable
{

    use ExportToArray;
    use ExportToJson;
    use ExportToQueryString;
    use ExportToString;
    use JsonSerialize;
    use Serializable;

}

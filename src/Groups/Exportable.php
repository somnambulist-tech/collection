<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Groups;

use Somnambulist\Collection\Behaviours\Export\ExportToArray;
use Somnambulist\Collection\Behaviours\Export\ExportToJson;
use Somnambulist\Collection\Behaviours\Export\ExportToQueryString;
use Somnambulist\Collection\Behaviours\Export\ExportToString;
use Somnambulist\Collection\Behaviours\Export\JsonSerialize;
use Somnambulist\Collection\Behaviours\Export\Serializable;

/**
 * Trait Exportable
 *
 * Methods for exporting the collection to various formats
 *
 * @package    Somnambulist\Collection\Groups
 * @subpackage Somnambulist\Collection\Groups\Exportable
 */
trait Exportable
{

    use ExportToArray;
    use ExportToJson;
    use ExportToQueryString;
    use ExportToString;
    use JsonSerialize;
    use Serializable;

}

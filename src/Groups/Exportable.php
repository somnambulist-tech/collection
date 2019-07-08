<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Groups;

use Somnambulist\Collection\Behaviours\Export\ExportableToArray;
use Somnambulist\Collection\Behaviours\Export\ExportableToJson;
use Somnambulist\Collection\Behaviours\Export\ExportableToString;
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

    use ExportableToArray;
    use ExportableToJson;
    use ExportableToString;
    use Serializable;

}

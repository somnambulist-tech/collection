<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Groups;

use Somnambulist\Collection\Behaviours\ExportableToArray;
use Somnambulist\Collection\Behaviours\ExportableToJson;
use Somnambulist\Collection\Behaviours\ExportableToString;
use Somnambulist\Collection\Behaviours\Serializable;

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

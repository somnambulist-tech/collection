<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection;

use Somnambulist\Components\Collection\Behaviours;
use Somnambulist\Components\Collection\Utils\Value;

/**
 * SimpleCollection
 *
 * A basic collection class that operates on its own keys. Values can be duplicated.
 */
class SimpleCollection extends AbstractCollection
{
    use Behaviours\CanAddAndRemoveItems;
    use Behaviours\Assertion\Assert;
    use Behaviours\MapReduce\Collapse;
    use Behaviours\MapReduce\Map;
    use Behaviours\Mutate\AppendValues;
    use Behaviours\Mutate\Clear;
    use Behaviours\Mutate\CombineValues;
    use Behaviours\Mutate\MergeValues;
    use Behaviours\Mutate\RemoveValue;
    use Behaviours\Mutate\Pop;
    use Behaviours\Mutate\PrependValues;
    use Behaviours\Mutate\SetKeyValue;
    use Behaviours\Mutate\Shift;
    use Behaviours\Mutate\UnsetKey;
    use Behaviours\Pipes\RunCallableOnValues;
    use Behaviours\Query\All;
    use Behaviours\Query\Contains;
    use Behaviours\Query\FilterByKey;
    use Behaviours\Query\FilterValues;
    use Behaviours\Query\First;
    use Behaviours\Query\GetValue;
    use Behaviours\Query\HasKey;
    use Behaviours\Query\Last;
    use Behaviours\Query\Keys;
    use Behaviours\Query\Sort;
    use Behaviours\Query\Unique;
    use Behaviours\Query\Value;
    use Behaviours\Query\Values;

    use Behaviours\Export\ExportToArray;
    use Behaviours\Export\ExportToJson;

    protected ?string $collectionClass = SimpleCollection::class;

    public function __construct(mixed $items = [])
    {
        $items = Value::toArray($items);

        Value::assertAllOfType($items, $this->type);

        $this->items = $items;
    }
}

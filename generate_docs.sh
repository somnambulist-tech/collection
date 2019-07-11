#!/usr/bin/env bash

folders=(
    "Aggregate"
    "Assertion"
    "Compare"
    "Export"
    "MapReduce"
    "Mutate"
    "Partition"
    "Pipes"
    "Query"
    "Strings"
)

files=(
    "aggregates.md"
    "assertable.md"
    "comparable.md"
    "exportable.md"
    "mappable.md"
    "mutateable.md"
    "partitionable.md"
    "runnable.md"
    "queryable.md"
    "string_helpers.md"
)

echo "Exporting docblocks to markdown"

for (( i=0; $i<${#folders[@]}; i+=1 ));
do
    folder=${folders[$i]}
    file=${files[$i]}

    echo "Converting ${folder}"

    vendor/bin/phpdoc-md generate src/Behaviours/${folder} > docs/${file}
done


<?php

namespace App\DTO;

class ResultCollection
{
    public function __construct(private array $collection)
    {
    }

    public function getValidResultsArray(): array
    {
        return array_map(
            fn(Result $result) => $result->toArray(),
            array_filter($this->collection, fn(Result $result) => $result->isValid())
        );
    }

    public function getInvalidResultsArray(): array
    {
        return array_map(
            fn(Result $result) => $result->toArray(),
            array_filter($this->collection, fn(Result $result) => $result->isInvalid())
        );
    }
}
<?php

namespace App;

use App\Actions\Actionable;
use App\DTO\ResultCollection;
use App\DTO\Row;

class Calculator
{
    public function __construct(private Actionable $action, private array $numbers)
    {
    }

    public function calculate(): ResultCollection
    {
        return new ResultCollection(
            array_map(fn(Row $row) => $this->action->getResult($row->getA(), $row->getB()), $this->numbers)
        );
    }
}
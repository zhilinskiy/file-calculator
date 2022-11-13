<?php

namespace App\Actions;

class DivisionAction extends BasicAction
{
    public const NAME = 'division';

    public function calculate(int $a, int $b): mixed
    {
        return $a / $b;
    }
}
<?php

namespace App\Actions;

class MultiplyAction extends BasicAction
{
    public const NAME = 'multiply';

    public function calculate(int $a, int $b): mixed
    {
        return $a * $b;
    }
}
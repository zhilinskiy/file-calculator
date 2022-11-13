<?php

namespace App\Actions;

class PlusAction extends BasicAction
{
    public const NAME = 'plus';

    public function calculate(int $a, int $b): mixed
    {
        return $a + $b;
    }
}
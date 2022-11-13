<?php

namespace App\Actions;

class MinusAction extends BasicAction
{
    public const NAME = 'minus';

    public function calculate(int $a, int $b): mixed
    {
        return $a - $b;
    }
}
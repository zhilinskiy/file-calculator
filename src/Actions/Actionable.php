<?php

namespace App\Actions;

use App\DTO\Result;

interface Actionable
{
    public function getResult(int $a, int $b): Result;
    public function calculate(int $a, int $b): mixed;

}
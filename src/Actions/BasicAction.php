<?php
declare(strict_types=1);

namespace App\Actions;

use App\DTO\Result;

abstract class BasicAction implements Actionable
{
    public const NAME = null;
    abstract public function calculate(int $a, int $b): mixed;

    public function getResult(int $a, int $b): Result
    {
        $result = null;
        try {
            $result = $this->calculate($a, $b);
        } catch (\Throwable $e) {
        }

        return new Result($a, $b, $result);
    }
}
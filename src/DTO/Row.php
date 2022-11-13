<?php

namespace App\DTO;

class Row
{
    private int $a;
    private int $b;

    public function getA(): int
    {
        return $this->a;
    }

    public function getB(): int
    {
        return $this->b;
    }

    public function __construct(string $a, string $b)
    {
        $this->a = (int) $a;
        $this->b = (int) $b;
    }
}
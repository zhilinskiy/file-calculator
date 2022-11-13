<?php
declare(strict_types=1);

namespace App\DTO;

class Result
{
    private int $a;
    private int $b;
    private mixed $result;

    public function __construct(int $a, int $b, mixed $result)
    {
        $this->a = $a;
        $this->b = $b;
        $this->result = $result;
    }

    public function isValid(): bool
    {
        return !is_null($this->result) && $this->result >= 0;
    }

    public function isInvalid(): bool
    {
        return !$this->isValid();
    }

    public function toArray(): array
    {
        return [$this->a, $this->b, $this->result];
    }
}
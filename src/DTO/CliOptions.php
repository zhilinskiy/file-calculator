<?php
declare(strict_types=1);

namespace App\DTO;

class CliOptions
{
    public function __construct(private string $file, private string $operation)
    {
    }

    public function getFile(): string
    {
        return $this->file;
    }

    public function getOperation(): string
    {
        return $this->operation;
    }
}
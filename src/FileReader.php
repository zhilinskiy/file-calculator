<?php

namespace App;

use App\DTO\Row;

class FileReader
{
    private const SEPARATOR = ';';
    private string $fileName;

    public function __construct(string $fileName)
    {
        if (!file_exists($fileName)) {
            throw new \InvalidArgumentException(
                sprintf('File with path "%s" not found', $fileName)
            );
        }

        $this->fileName = $fileName;
    }

    public function getNumbers(): ?array
    {
        $rawNumbers = array_map(
            fn($line) => str_getcsv($line, self::SEPARATOR),
            file($this->fileName)
        );

        return array_map(fn($row) => new Row($row[0], $row[1]), $rawNumbers);
    }

}
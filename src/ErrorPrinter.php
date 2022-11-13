<?php
declare(strict_types=1);

namespace App;

class ErrorPrinter
{
    private const FILE = 'error.log';
    private array $result;
    private string $path;

    public function __construct(array $result)
    {
        $this->path = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . self::FILE;
        if (file_exists($this->path)) {
            unlink($this->path);
        }
        $this->result = $result;
    }

    public function print(): string
    {
        file_put_contents($this->path, implode(PHP_EOL,
            array_map(
                fn($row) => sprintf('_numbers %d and %d are wrong_', $row[0], $row[1]),
                $this->result),
        ));

        return self::FILE;
    }
}
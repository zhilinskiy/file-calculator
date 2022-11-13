<?php
declare(strict_types=1);

namespace App;

class ResultPrinter
{
    private const FILE = 'result.csv';
    private const SEPARATOR = ' ';
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
        $fp = fopen($this->path, 'wb');
        foreach ($this->result as $fields) {
            fputcsv($fp, $fields, self::SEPARATOR);
        }
        fclose($fp);

        return self::FILE;
    }
}
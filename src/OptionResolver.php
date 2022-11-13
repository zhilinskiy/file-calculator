<?php
declare(strict_types=1);

namespace App;

use App\DTO\CliOptions;
use InvalidArgumentException;

class OptionResolver
{
    private const SHORT_OPTION_ACTION = 'a';
    private const LONG_OPTION_ACTION = 'action';
    private const SHORT_OPTION_FILE = 'f';
    private const LONG_OPTION_FILE = 'file';
    private const SHORT_OPTIONS = 'a:f:';
    private const LONG_OPTIONS = [
        'action:',
        'file:',
    ];

    public static function parseOptions(): CliOptions
    {
        $options = getopt(self::SHORT_OPTIONS, self::LONG_OPTIONS);
        $file = $options[self::LONG_OPTION_FILE] ?? $options[self::SHORT_OPTION_FILE] ?? self::fileParamNotFound();
        $action = $options[self::LONG_OPTION_ACTION] ?? $options[self::SHORT_OPTION_ACTION] ?? self::actionParamNotFound();

        return new CliOptions($file, $action);
    }

    private static function fileParamNotFound(): void
    {
        throw new InvalidArgumentException(
            sprintf('File parameter required! You can use: --%s {file} or -%s {file}',
                self::LONG_OPTION_FILE,
                self::SHORT_OPTION_FILE)
        );
    }

    private static function actionParamNotFound(): void
    {
        throw new InvalidArgumentException(
            sprintf('Action parameter required! You can use: --%s {action} or -%s {action}',
                self::LONG_OPTION_ACTION,
                self::SHORT_OPTION_ACTION)
        );
    }

}
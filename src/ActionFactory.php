<?php

namespace App;

use App\Actions\Actionable;
use App\Actions\DivisionAction;
use App\Actions\MinusAction;
use App\Actions\MultiplyAction;
use App\Actions\PlusAction;
use InvalidArgumentException;

class ActionFactory
{
    private static array $actions = [
        PlusAction::NAME => PlusAction::class,
        MinusAction::NAME => MinusAction::class,
        MultiplyAction::NAME => MultiplyAction::class,
        DivisionAction::NAME => DivisionAction::class
    ];

    public static function createFromString(string $action): Actionable
    {
        $action = self::$actions[$action] ?? self::actionNotFound($action);

        return new $action;
    }

    private static function actionNotFound(string $action) :void
    {
        throw new InvalidArgumentException(
            sprintf('"%s" is not supported action. Supported actions are: %s',
                $action,
                implode(', ', array_keys(self::$actions))
            )
        );
    }
}
<?php
require 'vendor/autoload.php';

use App\ActionFactory;
use App\Calculator;
use App\ErrorPrinter;
use App\FileReader;
use App\OptionResolver;
use App\ResultPrinter;

echo 'Hi! Calculation started ....'. PHP_EOL;
$options = OptionResolver::parseOptions();
$action = ActionFactory::createFromString($options->getOperation());
$numbers = (new FileReader($options->getFile()))->getNumbers();
$result = (new Calculator($action, $numbers))->calculate();
$fileWithResult = (new ResultPrinter($result->getValidResultsArray()))->print();
$fileWithErrors = (new ErrorPrinter($result->getInvalidResultsArray()))->print();

echo sprintf('File with result "%s", File with errors "%s". Buy!', $fileWithResult, $fileWithErrors). PHP_EOL;


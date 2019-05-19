<?php
namespace BrainGames\Cli;
use function cli\prompt as prompt;
use function cli\out as out;

function run($startMessage = '')
{
    out("Welcome to the Brain Games!\n");
    out($startMessage);
    $nameUser = prompt('May I have your name?');
    out("Hello, %s!\n", $nameUser);
    return $nameUser;
}

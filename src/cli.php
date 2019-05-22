<?php
namespace BrainGames\Cli;
use function cli\prompt as prompt;
use function cli\out as out;

const MESSAGE_OF_START_GAME = "Welcome to the Brain Games!\n";
const NAME_REQUEST = 'May I have your name?';
const GREETING_USER = "Hello, %s!\n";

function run($messegeTask = '')
{
    out(MESSAGE_OF_START_GAME);
    out($messegeTask);
    $nameUser = prompt(NAME_REQUEST);
    out(GREETING_USER, $nameUser);
    return $nameUser;
}

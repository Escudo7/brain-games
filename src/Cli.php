<?php
namespace BrainGames\Cli;
use function cli\prompt as prompt;

function run($question)
{
    return prompt($question);
}

function sayGreeting()
{
    print_r("Welcome to the Brain Games!\n");
}

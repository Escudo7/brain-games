<?php
namespace BrainGames\Cli;
use function cli\prompt as prompt;

function run($question)
{
    return prompt($question);
}

<?php
namespace BrainGames\engine;

use function cli\prompt;
use function cli\out;

const ROUNDS_COUNT = 3;

function engine($task, $generateGameDate)
{
    out("Welcome to the Brain Games!\n");
    out("$task\n");
    $userName = prompt("May I have your name?", null, ' ');
    out("Hello, %s!\n", $userName);
    for ($i = 1; $i <= ROUNDS_COUNT; $i++) {
        [$question, $rightAnswer] = $generateGameDate();
        out("Question: $question\n");
        $answerUser = prompt("Your answer");
        if ($answerUser === $rightAnswer) {
            out("Correct!\n");
        } else {
            out("'%s' is wrong answer ;(. Correct answer was '%s'.\n", $answerUser, $rightAnswer);
            out("Let's try again, %s!\n", $userName);
            return;
        }
    }
    out("Congratulations, %s!\n", $userName);
    return;
}

<?php
namespace BrainGames\engine;

use function cli\prompt;
use function cli\out;

const ROUNDS_COUNT = 3;

function startEngine($task, $generate)
{
    out("Welcome to the Brain Games!\n");
    out($task);
    $nameUser = prompt("May I have your name?");
    out("Hello, %s!\n", $nameUser);
    for ($i = 1; $i <= ROUNDS_COUNT; $i++) {
        [$question, $rightAnswer] = $generate();
        out(...$question);
        $answerUser = prompt("Your answer");
        if ($answerUser === $rightAnswer) {
            out("Correct!\n");
        } else {
            $textWrongAnswer = "'%s' is wrong answer ;(. Correct answer was '%s'.\nLet's try again, %s!\n";
            out($textWrongAnswer, $answerUser, $rightAnswer, $nameUser);
            return;
        }
    }
    out("Congratulations, %s!\n", $nameUser);
    return;
}

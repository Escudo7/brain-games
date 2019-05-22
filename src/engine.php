<?php
namespace BrainGames\engine;

use function BrainGames\cli\run;
use function cli\prompt;
use function cli\out;

const NUMBER_ROUNDS = 3;
const MESSAGE_WRONG_ANSWER = "'%s' is wrong answer ;(. Correct answer was '%s'.\nLet's try again, %s!\n";
const MESSAGE_RIGHT_ANSWER = "Correct!\n";
const MESSAGE_CONGRATULATION = "Congratulations, %s!\n";
const ANSWER_REQUEST = "Your answer";

function startEngine($messegeTask, $generate)
{
    $nameUser = run($messegeTask);
    for ($i = 1; $i <= NUMBER_ROUNDS; $i++) {
        $answerRight = $generate();
        $answerUser = prompt(ANSWER_REQUEST);
        if ($answerUser === $answerRight) {
            out(MESSAGE_RIGHT_ANSWER);
        } else {
            out(MESSAGE_WRONG_ANSWER, $answerUser, $answerRight, $nameUser);
            return;
        }
    }
    out(MESSAGE_CONGRATULATION, $nameUser);
    return;
}

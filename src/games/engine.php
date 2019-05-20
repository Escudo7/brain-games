<?php
namespace BrainGames\games\engine;

use function BrainGames\Cli\run as run;
use function cli\prompt as prompt;
use function cli\out as out;

use function BrainGames\games\progression\createQuestion as progrCreateQuestion;

function startEngine($startMessage, $generator)
{
    $nameUser = run($startMessage);
    for ($i = 1; $i <= 3; $i++) {
        $answerRight = $generator();
        $answerUser = prompt("Your answer");
        $result = getMessageToUser($answerUser, $answerRight, $nameUser);
        if ($result === false) {
            return false;
        }
    }
    out("Congratulations, %s!\n", $nameUser);
    return;
}

function getMessageToUser($answerUser, $answerRight, $nameUser)
{
    $wrongAnswer = "'%s' is wrong answer ;(. Correct answer was '%s'.\nLet's try again, %s!\n";
    $rightAnswer = "Correct!\n";
    if ($answerUser == $answerRight) {
        out($rightAnswer);
        return true;
    } else {
        out($wrongAnswer, $answerUser, $answerRight, $nameUser);
        return false;
    }
}

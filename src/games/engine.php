<?php
namespace BrainGames\games\engine;

use function cli\prompt as prompt;
use function cli\out as out;
use function BrainGames\games\calc\createQuestion as calcCreateQuestion;
use function BrainGames\games\even\createQuestion as evenCreateQuestion;
use function BrainGames\games\gcd\createQuestion as gcdCreateQuestion;

function startGame($nameGame, $nameUser)
{
    for ($i = 1; $i <= 3; $i++) {
        if ($nameGame == 'calc') {
            $answerRight = calcCreateQuestion();
        } elseif ($nameGame == 'even') {
            $answerRight = evenCreateQuestion();
        } elseif ($nameGame == 'gcd') {
            $answerRight = gcdCreateQuestion();
        }
        $answerUser = prompt("Your answer");
        $result = getMessageToUser($answerUser, $answerRight, $nameUser);
        if ($result === false) {
            return false;
        }
    }
    out("Congratulations, %s!\n", $nameUser);
    return true;
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

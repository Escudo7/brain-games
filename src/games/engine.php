<?php
namespace BrainGames\games\engine;

use function cli\prompt as prompt;
use function cli\out as out;
use function BrainGames\games\calc\getQuestion as calcGetQuestion;
use function BrainGames\games\calc\getAnswerRight as calcGetAnswerRight;
use function BrainGames\games\even\getQuestion as evenGetQuestion;
use function BrainGames\games\even\getAnswerRight as evenGetAnswerRight;

function startGame($nameGame, $nameUser)
{
    for ($i = 1; $i <= 3; $i++) {
        if ($nameGame == 'calc') {
            $question = calcGetQuestion();
            $answerUser = prompt("Your answer");
            $answerRight = calcGetAnswerRight(...$question);
        } elseif ($nameGame == 'even') {
            $question = evenGetQuestion();
            $answerUser = prompt("Your answer");
            $answerRight = evenGetAnswerRight(...$question);
        }
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

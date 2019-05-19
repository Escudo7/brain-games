<?php
namespace BrainGames\games\even;

use function cli\prompt as prompt;
use function cli\out as out;

function startGame($nameUser)
{
    for ($i = 1; $i <= 3; $i++) {
        $question = getQuestion();
        $answerUser = prompt("Your answer");
        $answerRight = getAnswerRight(...$question);
        $result = getMessageToUser($answerUser, $answerRight, $nameUser);
        if ($result === false) {
            return false;
        }
    }
    out("Congratulations, %s!\n", $nameUser);
    return true;
}

function getQuestion()
{
    $num = mt_rand(1, 100);
    out("Question: %s\n", $num);
    return [$num];
}

function getAnswerRight($question)
{
    return $question % 2 == 0 ? 'yes' : 'no';
}

function getMessageToUser($answerUser, $answerRight, $nameUser)
{
    $wrongAnswer = "'%s' is wrong answer ;(. Correct answer was '%s'.\nLet's try again, %s!\n";
    $rightAnswer = "Correct!\n";
    if ($answerUser === $answerRight) {
        out($rightAnswer);
        return true;
    } else {
        out($wrongAnswer, $answerUser, $answerRight, $nameUser);
        return false;
    }
}

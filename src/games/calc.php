<?php
namespace BrainGames\games\calc;

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
    $operators = ['+', '-', '*'];
    $num1 = mt_rand(0, 10);
    $num2 = mt_rand(0, 10);
    $operator = $operators[array_rand($operators)];
    out("Question: %s %s %s\n", $num1, $operator, $num2);
    return [$num1, $operator, $num2];
}

function getAnswerRight($num1, $operator, $num2)
{
    if ($operator == '+') {
        return $num1 + $num2;
    } elseif ($operator == '-') {
        return $num1 - $num2;
    } elseif ($operator == '*') {
        return $num1 * $num2;
    }
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

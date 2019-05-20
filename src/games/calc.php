<?php
namespace BrainGames\games\calc;

use function cli\out as out;
use function BrainGames\games\engine\startEngine as startEngine;

const OPERATORS = ['+', '-', '*'];

function startGameCalc()
{
    $startMessage = "What is the result of the expression?\n";
    $generator = function () {
        $num1 = mt_rand(0, 10);
        $num2 = mt_rand(0, 10);
        $operator = OPERATORS[array_rand(OPERATORS)];
        out("Question: %s %s %s\n", $num1, $operator, $num2);
        $answerRight = getAnswerRight($num1, $num2, $operator);
        return $answerRight;
    };
    startEngine($startMessage, $generator);
    return;
}

function getAnswerRight($num1, $num2, $operator)
{
    switch ($operator) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        default:
            return false;
    }
}

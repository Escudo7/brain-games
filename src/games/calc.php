<?php
namespace BrainGames\games\calc;

use function cli\out;
use function BrainGames\engine\startEngine;

const OPERATORS = ['+', '-', '*'];
const MESSAGE_TASK = "What is the result of the expression?\n";
const TEXT_QUESTION = "Question: %s %s %s\n";
const MIN_NUMBER = 0;
const MAX_NUMBER = 10;

function startGameCalc()
{
    $generate = function () {
        $num1 = mt_rand(MIN_NUMBER, MAX_NUMBER);
        $num2 = mt_rand(MIN_NUMBER, MAX_NUMBER);
        $operator = OPERATORS[array_rand(OPERATORS)];
        out(TEXT_QUESTION, $num1, $operator, $num2);
        $answerRight = getAnswerRight($num1, $num2, $operator);
        return (string) $answerRight;
    };
    startEngine(MESSAGE_TASK, $generate);
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
            throw new Exception("Invalid operator");
    }
}

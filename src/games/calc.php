<?php
namespace BrainGames\games\calc;

use function BrainGames\engine\startEngine;

const OPERATORS = ['+', '-', '*'];
const TASK = "What is the result of the expression?\n";
const MINIMUM_NUMBER = 0;
const MAXIMUM_NUMBER = 10;

function startGameCalc()
{
    $generate = function () {
        $number1 = mt_rand(MINIMUM_NUMBER, MAXIMUM_NUMBER);
        $number2 = mt_rand(MINIMUM_NUMBER, MAXIMUM_NUMBER);
        $operator = OPERATORS[array_rand(OPERATORS)];
        $question = ["Question: %s %s %s\n", $number1, $operator, $number2];
        $rightAnswer = getRightAnswer($number1, $number2, $operator);
        return [$question, (string) $rightAnswer];
    };
    startEngine(TASK, $generate);
    return;
}

function getRightAnswer($number1, $number2, $operator)
{
    switch ($operator) {
        case '+':
            return $number1 + $number2;
        case '-':
            return $number1 - $number2;
        case '*':
            return $number1 * $number2;
        default:
            throw new Exception("Invalid operator");
    }
}

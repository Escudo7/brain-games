<?php
namespace BrainGames\games\calc;

use function BrainGames\engine\engine;

const OPERATORS = ['+', '-', '*'];
const TASK = "What is the result of the expression?";
const MIN_NUMBER = 0;
const MAX_NUMBER = 10;

function startCalcGame()
{
    $generateDateForGame = function () {
        $number1 = mt_rand(MIN_NUMBER, MAX_NUMBER);
        $number2 = mt_rand(MIN_NUMBER, MAX_NUMBER);
        $operator = OPERATORS[array_rand(OPERATORS)];
        $question = "$number1 $operator $number2";
        $rightAnswer = getRightAnswer($number1, $number2, $operator);
        return [$question, (string) $rightAnswer];
    };
    engine(TASK, $generateDateForGame);
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

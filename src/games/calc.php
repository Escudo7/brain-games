<?php
namespace BrainGames\games\calc;

use function cli\prompt as prompt;
use function cli\out as out;

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

<?php
namespace BrainGames\games\calc;

use function cli\out as out;

function createQuestion()
{
    $operators = ['+', '-', '*'];
    $num1 = mt_rand(0, 10);
    $num2 = mt_rand(0, 10);
    $operator = $operators[array_rand($operators)];
    out("Question: %s %s %s\n", $num1, $operator, $num2);
    if ($operator == '+') {
        return $num1 + $num2;
    } elseif ($operator == '-') {
        return $num1 - $num2;
    } elseif ($operator == '*') {
        return $num1 * $num2;
    }
}

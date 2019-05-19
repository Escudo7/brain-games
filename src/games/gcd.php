<?php
namespace BrainGames\games\gcd;

use function cli\out as out;

function createQuestion()
{
    $num1 = mt_rand(1, 50);
    $num2 = mt_rand(1, 50);
    out("Question: %s %s \n", $num1, $num2);
    $min = min($num1, $num2);
    $gcd = 1;
    for ($i = 2; $i <= $min; $i++) {
        if ($num1 % $i == 0 && $num2 % $i == 0) {
            $gcd = $i;
        }
    }
    return $gcd;
}

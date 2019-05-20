<?php
namespace BrainGames\games\gcd;

use function cli\out as out;
use function BrainGames\games\engine\startEngine as startEngine;

function startGameGcd()
{
    $startMessage = "Find the greatest common divisor of given numbers.\n";
    $generator = function () {
        $num1 = mt_rand(1, 50);
        $num2 = mt_rand(1, 50);
        out("Question: %s %s \n", $num1, $num2);
        $answerRight = getAnswerRight($num1, $num2);
        return $answerRight;
    };
    startEngine($startMessage, $generator);
    return;
}

function getAnswerRight($num1, $num2)
{
    $min = min($num1, $num2);
    $gcd = 1;
    for ($i = 2; $i <= $min; $i++) {
        if (isDivisor($num1, $num2, $i) === true) {
            $gcd = $i;
        }
    }
    return $gcd;
}

function isDivisor($numer1, $numer2, $divisor)
{
    return $numer1 % $divisor === 0 && $numer2 % $divisor === 0;
}

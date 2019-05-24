<?php
namespace BrainGames\games\gcd;

use function BrainGames\engine\startEngine;

const TASK = "Find the greatest common divisor of given numbers.\n";
const MINIMUM_NUMBER = 1;
const MAXIMUM_NUMBER = 50;

function startGameGcd()
{
    $generate = function () {
        $number1 = mt_rand(MINIMUM_NUMBER, MAXIMUM_NUMBER);
        $number2 = mt_rand(MINIMUM_NUMBER, MAXIMUM_NUMBER);
        $question = ["Question: %s %s \n", $number1, $number2];
        $minimumNumber = min($number1, $number2);
        $greatestCommonDivisor = 1;
        for ($i = 2; $i <= $minimumNumber; $i++) {
            if (isDivisor($number1, $i) === true && isDivisor($number2, $i) === true) {
                $greatestCommonDivisor = $i;
            }
        }
        return [$question, (string) $greatestCommonDivisor];
    };
    startEngine(TASK, $generate);
    return;
}

function isDivisor($number, $divisor)
{
    return $number % $divisor === 0;
}

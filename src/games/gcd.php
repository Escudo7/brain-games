<?php
namespace BrainGames\games\gcd;

use function BrainGames\engine\engine;

const TASK = "Find the greatest common divisor of given numbers.";
const MIN_NUMBER = 1;
const MAX_NUMBER = 50;

function startGcdGame()
{
    $generateDateForGame = function () {
        $number1 = mt_rand(MIN_NUMBER, MAX_NUMBER);
        $number2 = mt_rand(MIN_NUMBER, MAX_NUMBER);
        $question = "$number1 $number2";
        $greatestCommonDivisor = getGreatestCommonDivisor($number1, $number2);
        return [$question, (string) $greatestCommonDivisor];
    };
    engine(TASK, $generateDateForGame);
    return;
}

function getGreatestCommonDivisor($number1, $number2)
{
    $minimumNumber = min($number1, $number2);
    $greatestCommonDivisor = 1;
    for ($i = 2; $i <= $minimumNumber; $i++) {
        if ($number1 % $i === 0 && $number2 % $i === 0) {
                $greatestCommonDivisor = $i;
        }
    }
    return $greatestCommonDivisor;
}

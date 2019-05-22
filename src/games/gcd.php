<?php
namespace BrainGames\games\gcd;

use function cli\out;
use function BrainGames\engine\startEngine;

const MESSAGE_TASK = "Find the greatest common divisor of given numbers.\n";
const TEXT_QUESTION = "Question: %s %s \n";
const MIN_NUMBER = 1;
const MAX_NUMBER = 50;

function startGameGcd()
{
    $generate = function () {
        $number1 = mt_rand(MIN_NUMBER, MAX_NUMBER);
        $number2 = mt_rand(MIN_NUMBER, MAX_NUMBER);
        out(TEXT_QUESTION, $number1, $number2);
        $answerRight = getAnswerRight($number1, $number2);
        return (string) $answerRight;
    };
    startEngine(MESSAGE_TASK, $generate);
    return;
}

function getAnswerRight($number1, $number2)
{
    $minNumber = min($number1, $number2);
    $gcd = 1;
    for ($i = 2; $i <= $minNumber; $i++) {
        if (isDivision($number1, $i) === true && isDivision($number2, $i) === true) {
            $gcd = $i;
        }
    }
    return $gcd;
}

function isDivision($number, $divisor)
{
    return $number % $divisor === 0;
}

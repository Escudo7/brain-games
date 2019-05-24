<?php
namespace BrainGames\games\prime;

use function BrainGames\engine\startEngine;

const TASK = "Answer \"yes\" if given number is prime. Otherwise answer \"no\"\n";
const MINIMUN_NUMBER = 2;
const MAXIMUM_NUMBER = 101;

function startGamePrime()
{
    $generate = function () {
        $number = mt_rand(MINIMUN_NUMBER, MAXIMUM_NUMBER);
        $question = ["Question: %s\n", $number];
        $rightAnswer = 'yes';
        for ($i = 2; $i <= ceil($number / 2); $i++) {
            if (isDivisor($number, $i)) {
                $rightAnswer = 'no';
            }
        }
        return [$question, $rightAnswer];
    };
    startEngine(TASK, $generate);
    return;
}

function isDivisor($number, $divisor)
{
    return $number % $divisor === 0;
}

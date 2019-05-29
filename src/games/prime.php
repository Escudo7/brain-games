<?php
namespace BrainGames\games\prime;

use function BrainGames\engine\engine;

const TASK = 'Answer "yes" if given number is prime. Otherwise answer "no"';
const MIN_NUMBER = 2;
const MAX_NUMBER = 101;

function startPrimeGame()
{
    $generateGameDate = function () {
        $number = mt_rand(MIN_NUMBER, MAX_NUMBER);
        $rightAnswer = isPrime($number) ? 'yes' : 'no';
        return [$number, $rightAnswer];
    };
    engine(TASK, $generateGameDate);
    return;
}

function isPrime($number)
{
    for ($i = 2; $i <= ceil($number / 2); $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}

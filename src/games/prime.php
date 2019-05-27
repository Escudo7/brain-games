<?php
namespace BrainGames\games\prime;

use function BrainGames\engine\engine;

const TASK = 'Answer "yes" if given number is prime. Otherwise answer "no"';
const MINIMUN_NUMBER = 2;
const MAXIMUM_NUMBER = 101;

function startGamePrime()
{
    $generateDateForGame = function () {
        $number = mt_rand(MINIMUN_NUMBER, MAXIMUM_NUMBER);
        $question = "{$number}";
        isPrime($number) ? $rightAnswer = 'yes' : $rightAnswer = 'no';
        return [$question, $rightAnswer];
    };
    engine(TASK, $generateDateForGame);
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

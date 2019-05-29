<?php
namespace BrainGames\games\even;

use function BrainGames\engine\engine;

const TASK = 'Answer "yes" if number even otherwise answer "no".';
const MIN_NUMBER = 1;
const MAX_NUMBER = 100;

function startEvenGame()
{
    $generateGameDate = function () {
        $number = mt_rand(MIN_NUMBER, MAX_NUMBER);
        $rightAnswer = isEven($number) ? 'yes' : 'no';
        return [$number, $rightAnswer];
    };
    engine(TASK, $generateGameDate);
    return;
}

function isEven($number)
{
    return $number % 2 === 0;
}

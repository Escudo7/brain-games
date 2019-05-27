<?php
namespace BrainGames\games\even;

use function BrainGames\engine\engine;

const TASK = 'Answer "yes" if number even otherwise answer "no".';
const MINIMUM_NUMBER = 1;
const MAXIMUM_NUMBER = 100;

function startGameEven()
{
    $generateDateForGame = function () {
        $number = mt_rand(MINIMUM_NUMBER, MAXIMUM_NUMBER);
        $question = "{$number}";
        isEven($number) ? $rightAnswer = 'yes' : $rightAnswer = 'no';
        return [$question, $rightAnswer];
    };
    engine(TASK, $generateDateForGame);
    return;
}

function isEven($number)
{
    return $number % 2 === 0;
}

<?php
namespace BrainGames\games\even;

use function BrainGames\engine\startEngine;

const TASK = "Answer \"yes\" if number even otherwise answer \"no\".\n";
const MINIMUM_NUMBER = 1;
const MAXIMUM_NUMBER = 100;

function startGameEven()
{
    $generate = function () {
        $number = mt_rand(MINIMUM_NUMBER, MAXIMUM_NUMBER);
        $question = ["Question: %s\n", $number];
        isEven($number) ? $rightAnswer = 'yes' : $rightAnswer = 'no';
        return [$question, $rightAnswer];
    };
    startEngine(TASK, $generate);
    return;
}

function isEven($number)
{
    return $number % 2 === 0;
}

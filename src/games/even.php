<?php
namespace BrainGames\games\even;

use function cli\out;
use function BrainGames\engine\startEngine;

const MESSAGE_TASK = "Answer \"yes\" if number even otherwise answer \"no\".\n";
const TEXT_QUESTION = "Question: %s\n";
const MIN_NUMBER = 1;
const MAX_NUMBER = 100;

function startGameEven()
{
    $generate = function () {
        $number = mt_rand(MIN_NUMBER, MAX_NUMBER);
        out(TEXT_QUESTION, $number);
        isEven($number) ? $answerRight = 'yes' : $answerRight = 'no';
        return $answerRight;
    };
    startEngine(MESSAGE_TASK, $generate);
    return;
}

function isEven($number)
{
    return $number % 2 === 0;
}

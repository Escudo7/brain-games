<?php
namespace BrainGames\games\prime;

use function cli\out;
use function BrainGames\engine\startEngine;

const MESSAGE_TASK = "Answer \"yes\" if given number is prime. Otherwise answer \"no\"\n";
const TEXT_QUESTION = "Question: %s\n";
const MIN_NUMBER = 2;
const MAX_NUMBER = 101;

function startGamePrime()
{
    $generate = function () {
        $number = mt_rand(MIN_NUMBER, MAX_NUMBER);
        out(TEXT_QUESTION, $number);
        $answerRight = getAnswerRight($number);
        return $answerRight;
    };
    startEngine(MESSAGE_TASK, $generate);
    return;
}

function getAnswerRight($number)
{
    for ($i = 2; $i <= ceil($number / 2); $i++) {
        if (isDivision($number, $i)) {
            return 'no';
        }
    }
    return 'yes';
}

function isDivision($number, $divisor)
{
    return $number % $divisor === 0;
}

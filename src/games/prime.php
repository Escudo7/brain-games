<?php
namespace BrainGames\games\prime;
use function BrainGames\games\engine\startEngine as startEngine;

use function cli\out as out;

function startGamePrime()
{
    $startMessage = "Answer \"yes\" if given number is prime. Otherwise answer \"no\"\n";
    $generator = function () {
        $num = mt_rand(2, 101);
        out("Question: %s\n", $num);
        $answerRight = getAnswerRight($num);
        return $answerRight;
    };
    startEngine($startMessage, $generator);
    return;
}

function getAnswerRight($num)
{
    for ($i = 2; $i < $num; $i++) {
        if (isNoPrime($num, $i) === true) {
            return 'no';
        }
    }
    return 'yes';
}

function isNoPrime($num, $divisor)
{
    return $num % $divisor === 0;
}

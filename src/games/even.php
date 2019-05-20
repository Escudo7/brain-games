<?php
namespace BrainGames\games\even;

use function cli\out as out;
use function BrainGames\games\engine\startEngine as startEngine;

function startGameEven()
{
    $startMessage = "Answer \"yes\" if number even otherwise answer \"no\".\n";
    $generator = function () {
        $num = mt_rand(1, 100);
        out("Question: %s\n", $num);
        $answerRight = getAnswerRight($num);
        return $answerRight;
    };
    startEngine($startMessage, $generator);
    return;
}

function getAnswerRight($num)
{
    if (isEven($num) === true) {
        return 'yes';
    } else {
        return 'no';
    }
}

function isEven($num)
{
    return $num % 2 === 0;
}

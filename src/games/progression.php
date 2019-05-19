<?php
namespace BrainGames\games\progression;

use function cli\out as out;

function createQuestion()
{
    $startNum = mt_rand(0, 10);
    $progressionStep = mt_rand(1, 10);
    $progression = [];
    for ($i = 0; $i < 10; $i++) {
        $progression[] = $startNum;
        $startNum += $progressionStep;
    }
    $keySecretNum = mt_rand(0, 9);
    $secretNum = $progression[$keySecretNum];
    $progression[$keySecretNum] = '..';
    $progressionToString = implode(' ', $progression);
    out("Question: %s\n", $progressionToString);
    return $secretNum;
}

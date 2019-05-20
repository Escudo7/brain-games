<?php
namespace BrainGames\games\progression;

use function cli\out as out;
use function BrainGames\games\engine\startEngine as startEngine;

function startGameProgression()
{
    $startMessage = "What number is missing in the progression?\n";
    $generator = function () {
        $numberOfProgression = 10;
        $startNum = mt_rand(0, 10);
        $progressionStep = mt_rand(1, 10);
        $progression = [];
        $numberOfProgression = 10;
        for ($i = 0; $i < $numberOfProgression; $i++) {
            $progression[] = $startNum;
            $startNum += $progressionStep;
        }
        $keySecretNum = mt_rand(0, $numberOfProgression - 1);
        $secretNum = $progression[$keySecretNum];
        $progression[$keySecretNum] = '..';
        $progressionToString = implode(' ', $progression);
        out("Question: %s\n", $progressionToString);
        return $secretNum;
    };
    startEngine($startMessage, $generator);
    return;
}

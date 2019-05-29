<?php
namespace BrainGames\games\progression;

use function BrainGames\engine\engine;

const TASK = "What number is missing in the progression?";
const LENGTH_PROGRESSION = 10;
const MIN_STEP_PROGRESSION = 1;
const MAX_STEP_PROGRESSION = 10;
const MIN_FIRST_NUMBER = 0;
const MAX_FIRST_NUMBER = 10;

function startProgressionGame()
{
    $generateGameDate = function () {
        $firstNumber = mt_rand(MIN_FIRST_NUMBER, MAX_FIRST_NUMBER);
        $stepProgression = mt_rand(MIN_STEP_PROGRESSION, MAX_STEP_PROGRESSION);
        for ($i = 0; $i < LENGTH_PROGRESSION; $i++) {
            $progression[] = $firstNumber + $stepProgression * $i;
        }
        $keyOfSecretNumber = mt_rand(0, LENGTH_PROGRESSION - 1);
        $rightAnswer = $progression[$keyOfSecretNumber];
        $progression[$keyOfSecretNumber] = '..';
        $progressionToString = implode(' ', $progression);
        return [$progressionToString, (string) $rightAnswer];
    };
    engine(TASK, $generateGameDate);
    return;
}

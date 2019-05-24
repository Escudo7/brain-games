<?php
namespace BrainGames\games\progression;

use function BrainGames\engine\startEngine;

const TASK = "What number is missing in the progression?\n";
const LENGTH_PROGRESSION = 10;
const MINIMUM_STEP_PROGRESSION = 1;
const MAXIMUM_STEP_PROGRESSION = 10;
const MINIMUM_FIRST_NUMBER = 0;
const MAXIMUM_FIRST_NUMBER = 10;

function startGameProgression()
{
    $generate = function () {
        $firstNumber = mt_rand(MINIMUM_FIRST_NUMBER, MAXIMUM_FIRST_NUMBER);
        $stepProgression = mt_rand(MINIMUM_STEP_PROGRESSION, MAXIMUM_STEP_PROGRESSION);
        $progression = [];
        for ($i = 0; $i < LENGTH_PROGRESSION; $i++) {
            $progression[] = $firstNumber;
            $firstNumber += $stepProgression;
        }
        $keySecretNumber = mt_rand(0, LENGTH_PROGRESSION - 1);
        $rightAnswer = $progression[$keySecretNumber];
        $progression[$keySecretNumber] = '..';
        $question = ["Question: %s\n", implode(' ', $progression)];
        return [$question, (string) $rightAnswer];
    };
    startEngine(TASK, $generate);
    return;
}

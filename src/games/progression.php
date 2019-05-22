<?php
namespace BrainGames\games\progression;

use function cli\out;
use function BrainGames\engine\startEngine;

const MESSAGE_TASK = "What number is missing in the progression?\n";
const TEXT_QUESTION = "Question: %s\n";
const LENGTH_PROGRESSION = 10;
const MIN_STEP_PROGRESSION = 1;
const MAX_STEP_PROGRESSION = 10;
const MIN_FIRST_NUMBER = 0;
const MAX_FIRST_NUMBER = 10;

function startGameProgression()
{
    $generator = function () {
        $firstNumber = mt_rand(MIN_FIRST_NUMBER, MAX_FIRST_NUMBER);
        $stepProgression = mt_rand(MIN_STEP_PROGRESSION, MAX_STEP_PROGRESSION);
        $progression = [];
        for ($i = 0; $i < LENGTH_PROGRESSION; $i++) {
            $progression[] = $firstNumber;
            $firstNumber += $stepProgression;
        }
        $keySecretNumber = mt_rand(0, LENGTH_PROGRESSION - 1);
        $secretNumber = $progression[$keySecretNumber];
        $progression[$keySecretNumber] = '..';
        out(TEXT_QUESTION, implode(' ', $progression));
        return (string) $secretNumber;
    };
    startEngine(MESSAGE_TASK, $generator);
    return;
}

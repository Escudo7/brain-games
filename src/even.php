<?php
namespace BrainGames\even;

use function cli\prompt as prompt;
use function cli\out as out;

function gamesEven($name)
{
    $wrongAnswer = "'%s' is wrong answer ;(. Correct answer was '%s'.\nLet's try again, {$name}!\n";
    $rightAnswer = "Correct!\n";
    for ($i = 1; $i <= 3; $i++) {
        $num = mt_rand(1, 100);
        out("Question: %s\n", $num);
        $answer = prompt("Your answer");
        if ($num % 2 == 0) {
            if ($answer == 'yes') {
                out($rightAnswer);
            } else {
                out($wrongAnswer, $answer, 'yes');
                return false;
            }
        } else {
            if ($answer == 'no') {
                out($rightAnswer);
            } else {
                out($wrongAnswer, $answer, 'no');
                return false;
            }
        }
    }
    print_r("Congratulations, {$name}!\n");
    return true;
}

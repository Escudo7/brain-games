<?php
namespace BrainGames\games\prime;

use function cli\out as out;

function createQuestion()
{
    $num = mt_rand(2, 101);
    out("Question: %s\n", $num);
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i === 0) {
            return 'no';
        }
    }
    return 'yes';
}

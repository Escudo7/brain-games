<?php
namespace BrainGames\games\even;

use function cli\out as out;

function createQuestion()
{
    $num = mt_rand(1, 100);
    out("Question: %s\n", $num);
    return $num % 2 == 0 ? 'yes' : 'no';
}

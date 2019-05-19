<?php
namespace BrainGames\games\even;

use function cli\prompt as prompt;
use function cli\out as out;

function getQuestion()
{
    $num = mt_rand(1, 100);
    out("Question: %s\n", $num);
    return [$num];
}

function getAnswerRight($question)
{
    return $question % 2 == 0 ? 'yes' : 'no';
}

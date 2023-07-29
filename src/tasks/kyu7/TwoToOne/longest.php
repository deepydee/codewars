<?php

declare(strict_types=1);

function longest(string $a, string $b): string
{
    $res = array_unique(array_merge(array_unique(str_split($a)), array_unique(str_split($b))));
    asort($res, SORT_STRING);

    return join($res);
}

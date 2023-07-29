<?php

declare(strict_types=1);

function descendingOrder(int $n): int
{
    $arr = str_split("$n");

    usort($arr, fn ($a, $b) => $b <=> $a);

    return +join($arr);
}

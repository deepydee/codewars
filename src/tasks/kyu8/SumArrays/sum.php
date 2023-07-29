<?php

declare(strict_types=1);

function sum(array $a): float
{
    return array_reduce($a, fn ($sum, $num) => $sum += $num, 0);
}

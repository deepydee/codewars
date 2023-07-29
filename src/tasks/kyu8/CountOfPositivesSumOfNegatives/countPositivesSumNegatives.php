<?php

declare(strict_types=1);

function countPositivesSumNegatives(?array $input): array
{
    return empty($input) ? [] : [
        count(array_filter($input, fn ($num) => $num > 0)),
        array_sum(array_filter($input, fn ($num) => $num < 0))
    ];
}

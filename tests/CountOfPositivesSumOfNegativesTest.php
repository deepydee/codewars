<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

final class CountOfPositivesSumOfNegativesTest extends TestCase
{
    public function testIfTheInputArrayIsEmptyReturnEmptyArray()
    {
        $this->assertSame([], countPositivesSumNegatives([]), 'If the input array is empty, return empty array');
        $this->assertSame([], countPositivesSumNegatives(null), 'If the input array is empty, return empty array');
    }

    public function testExample()
    {
        $this->assertSame([10, -65], countPositivesSumNegatives([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, -11, -12, -13, -14, -15]));
        $this->assertSame([8, -50], countPositivesSumNegatives([0, 2, 3, 0, 5, 6, 7, 8, 9, 10, -11, -12, -13, -14]));
    }

    public static function solution($input)
    {
        if (empty($input)) {
            return [];
        }
        $a = 0;
        $b = 0;
        foreach ($input as $val) {
            if ($val > 0) {
                ++$a;
            } else {
                $b += $val;
            }
        }
        return [$a, $b];
    }

    #[DataProvider('randomProvider')]
    public function testRandom($input, $expected)
    {
        $this->assertSame($expected, countPositivesSumNegatives($input));
    }

    public static function randomProvider()
    {
        $data = [];

        for ($i = 0; $i < 100; $i++) {
            $input = [];

            for ($j = 0; $j < 10; $j++) {
                $input[] = rand(1, 100) * (1 - rand(0, 2));
            }

            $data[] = [$input, self::solution($input)];
        }

        return $data;
    }
}

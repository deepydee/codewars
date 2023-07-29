<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class DescendingOrderTest extends TestCase
{
    public function testDigits()
    {
        $this->assertSame(0, descendingOrder(0));
        $this->assertSame(1, descendingOrder(1));
    }

    public function testSmallNumbers()
    {
        $this->assertSame(51, descendingOrder(15));
        $this->assertSame(2110, descendingOrder(1021));
    }

    public function testBigNumbers()
    {
        $this->assertSame(987654321, descendingOrder(123456789));
    }

    private function sol(int $n): int
    {
        $digits = str_split((string) $n);

        rsort($digits);

        return (int) implode('', $digits);
    }


    public function testRandom()
    {
        foreach (range(1, 100) as $_) {
            $n = rand(1, 20000000000);
            $this->assertSame($this->sol($n), descendingOrder($n));
        }
    }
}

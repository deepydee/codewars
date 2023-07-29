<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class SumTest extends TestCase
{
    public function testFixed()
    {
        $this->assertEquals(0, sum([]));
        $this->assertSame(9.2, sum([1, 5.2, 4, 0, -1]));
    }
}

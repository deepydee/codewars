<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class ConvertABooleanToAStringTest extends TestCase
{
    public function testFixedTests()
    {
        $this->assertSame("true", booleanToString(true));
        $this->assertSame("false", booleanToString(false));
    }
}

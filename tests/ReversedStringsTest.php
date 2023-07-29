<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class ReversedStringsTest extends TestCase
{
    public function testExamples()
    {
        $this->assertSame("dlrow", solution("world"));
        $this->assertSame("olleh", solution("hello"));
        $this->assertSame("", solution(""));
        $this->assertSame('h', solution("h"));
    }

    public function testFixed()
    {
        $this->assertSame(".desu reve ev'I etis tseb eht si srawedoC", solution("Codewars is the best site I've ever used."));
        $this->assertSame("!reve egaugnal gnitpircs tseb eht si PHP", solution("PHP is the best scripting language ever!"));
        $this->assertSame(".egaugnal gnimmargorp ralupop a osla si tpircsavaJ", solution("Javascript is also a popular programming language."));
        $this->assertSame("): nuf si sgnirts gnisreveR", solution("Reversing strings is fun :)"));
        $this->assertSame("); ysae si sgnirts gnisreveR", solution("Reversing strings is easy ;)"));
    }

    protected function randomToken()
    {
        return implode(array_map(function () {
            return "abcdefghijklmnopqrstuvwxyz0123456789"[rand(0, 35)];
        }, range(1, 20)));
    }

    protected function solution($s)
    {
        return strrev($s);
    }

    public function testRandom()
    {
        for ($i = 0; $i < 100; $i++) $this->assertSame($this->solution($s = $this->randomToken()), solution($s));
    }
}

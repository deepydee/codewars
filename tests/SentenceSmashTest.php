<?php

declare(strict_types=1);

namespace Tasks\kuy8\SentenceSmash;

use PHPUnit\Framework\TestCase;

final class SentenceSmashTest extends TestCase
{
    public function testExamples()
    {
        $this->assertSame('hello', smash(["hello"]));
        $this->assertSame('hello world', smash(["hello", "world"]));
    }

    public function testFixed()
    {
        $this->assertSame('', smash([]));
        $this->assertSame('hello amazing world', smash(['hello', 'amazing', 'world']));
        $this->assertSame('this is a really long sentence', smash(['this', 'is', 'a', 'really', 'long', 'sentence']));
    }

    protected function solution(array $a): string
    {
        return implode(' ', $a);
    }

    protected function randomArray(): array
    {
        return array_map(function () {
            return implode(array_map(function () {
                return range('a', 'z')[random_int(0, 25)];
            }, range(1, random_int(3, 16))));
        }, range(1, random_int(10, 100)));
    }

    public function testRandom()
    {
        foreach (range(1, 1e3) as $_) $this->assertSame($this->solution($a = $this->randomArray()), smash($a));
    }
}

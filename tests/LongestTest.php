<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class LongestTest extends TestCase
{
    private function revTest($actual, $expected)
    {
        $this->assertSame($expected, $actual);
    }

    public function testBasics()
    {
        $this->revTest(longest("aretheyhere", "yestheyarehere"), "aehrsty");
        $this->revTest(longest("loopingisfunbutdangerous", "lessdangerousthancoding"), "abcdefghilnoprstu");
        $this->revTest(longest("inmanylanguages", "theresapairoffunctions"), "acefghilmnoprstuy");
        $this->revTest(longest("lordsofthefallen", "gamekult"), "adefghklmnorstu");
        $this->revTest(longest("codewars", "codewars"), "acdeorsw");
        $this->revTest(longest("agenerationmustconfrontthelooming", "codewarrs"), "acdefghilmnorstuw");
    }

    private function doStr($k, $p)
    {
        $s = "";
        $j = 0;

        while ($j < $k) {
            $c = chr(rand(97 + $p, 122));

            for ($i = 0; $i < rand(1, 8); $i++)
                $s .= $c;
            $j++;
        }

        return $s;
    }

    private function _longestIN($a, $b)
    {
        $c = str_split($a . $b);
        sort($c);
        $e = preg_replace('/(\w)\1+/', "$1", implode("", $c));
        return $e;
    }

    public function testRandom()
    {
        for ($i = 0; $i < 200; $i++) {
            $n = rand(10, 20);
            $a = $this->doStr($n, 0);
            $p = rand(2, 5);
            $b = $this->doStr($p, 8);
            $sol = $this->_longestIN($a, $b);
            $ans = longest($a, $b);
            //echo $sol."\n";
            $this->revTest($ans, $sol);
        }
    }
}

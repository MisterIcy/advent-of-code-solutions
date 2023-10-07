<?php

declare(strict_types=1);

namespace Akoutroulis\AdventOfCodeSolutions\Tests\Y2015\Day5;

use Akoutroulis\AdventOfCodeSolutions\Y2015\Day5\Day5;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Akoutroulis\AdventOfCodeSolutions\Y2015\Day5\Day5
 */
final class Day5Test extends TestCase
{
    public static function exampleProvider(): array
    {
        return [
            'example1' => ['ugknbfddgicrmopn', true],
            'example2' => ['aaa', true],
            'example3' => ['jchzalrnumimnmhp', false],
            'example4' => ['haegwjzuvuyypxyu', false],
            'example5' => ['dvszwmarrgswjxmb', false]
        ];
    }

    /**
     * @param string $input
     * @param bool $outcome
     * @return void
     * @dataProvider exampleProvider
     */
    public function testIsNice(string $input, bool $outcome): void
    {
        $d = new Day5($input);
        self::assertSame($outcome, $d->isNice($input));
    }

    public static function exampleProvider2(): array
    {
        return [
            'example1' => ['qjhvhtzxzqqjkmpb', true],
            'example2' => ['xxyxx', true],
            'example3' => ['uurcxstgmygtbstg', false],
            'example4' => ['ieodomkazucvgmuy', false],
            'example5' => ['aaaba', false]
        ];
    }

    /**
     * @param string $input
     * @param bool $outcome
     * @return void
     * @dataProvider exampleProvider2
     */
    public function testIsNicePart2(string $input, bool $outcome): void
    {
        $d = new Day5($input);
        self::assertSame($outcome, $d->isNicePart2($input));
    }
}

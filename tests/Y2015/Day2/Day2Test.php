<?php

declare(strict_types=1);

namespace Akoutroulis\AdventOfCodeSolutions\Tests\Y2015\Day2;

use Akoutroulis\AdventOfCodeSolutions\Y2015\Day2\Day2;
use PHPUnit\Framework\TestCase;

final class Day2Test extends TestCase
{
    public static function exampleProvider1(): array
    {
        return [
            'example1' => ['2x3x4', 58],
            'example2' => ['1x1x10', 43]
        ];
    }

    /**
     * @param string $dimensions
     * @param int $outcome
     * @return void
     * @covers       \Akoutroulis\AdventOfCodeSolutions\Y2015\Day2\Day2
     * @dataProvider exampleProvider1
     */
    public function testGetTotalWrapPaper(string $dimensions, int $outcome): void
    {
        $day2 = new Day2($dimensions);
        self::assertSame($outcome, $day2->getDimensions());
    }

    public static function exampleProvider2(): array
    {
        return [
            'example1' => ['2x3x4', 34],
            'example2' => ['1x1x10', 14]
        ];
    }

    /**
     * @param string $dimensions
     * @param int $outcome
     * @return void
     * @covers       \Akoutroulis\AdventOfCodeSolutions\Y2015\Day2\Day2
     * @dataProvider exampleProvider2
     */
    public function testGetTotalRibbonLength(string $dimensions, int $outcome): void
    {
        $day2 = new Day2($dimensions);
        self::assertSame($outcome, $day2->getRibbonLength());
    }
}

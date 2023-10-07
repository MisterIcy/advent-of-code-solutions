<?php

declare(strict_types=1);

namespace Akoutroulis\AdventOfCodeSolutions\Tests\Y2015\Day2;

use Akoutroulis\AdventOfCodeSolutions\Y2015\Day2\BoxDimensions;
use PHPUnit\Framework\TestCase;

final class BoxDimensionsTest extends TestCase
{
    public static function exampleProvider1(): array
    {
        return [
            'example1' => ['2x3x4', 58],
            'example2' => ['1x1x10', 43]
        ];
    }

    /**
     * @return void
     * @dataProvider exampleProvider1
     * @covers       \Akoutroulis\AdventOfCodeSolutions\Y2015\Day2\BoxDimensions
     */
    public function testGetDimension(string $input, int $outcome): void
    {
        $dimensions = new BoxDimensions($input);
        $this->assertSame($outcome, $dimensions->getArea());
    }


    public static function exampleProvider2(): array
    {
        return [
            'example1' => ['2x3x4', 34],
            'example2' => ['1x1x10', 14]
        ];
    }

    /**
     * @param string $input
     * @param int $outcome
     * @return void
     * @covers       \Akoutroulis\AdventOfCodeSolutions\Y2015\Day2\Day2
     * @dataProvider exampleProvider2
     */
    public function testGetRibbonSize(string $input, int $outcome): void
    {
        $dimensions = new BoxDimensions($input);
        self::assertSame($outcome, $dimensions->getRibbonLength());
    }
}

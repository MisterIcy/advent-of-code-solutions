<?php

namespace Akoutroulis\AdventOfCodeSolutions\Tests\Y2015\Day3;

use Akoutroulis\AdventOfCodeSolutions\Y2015\Day3\Day3;
use PHPUnit\Framework\TestCase;

class Day3Test extends TestCase
{

    public static function example1Provider(): array
    {
        return [
            'example1' => ['>', 2],
            'example2' => ['^>v<', 4],
            'example3' => ['^v^v^v^v^v', 2]
        ];
    }

    public static function example1Provider2(): array
    {
        return [
            'example1' => ['^v', 3],
            'example2' => ['^>v<', 3],
            'example3' => ['^v^v^v^v^v', 11]
        ];
    }

    /**
     * @param string $input
     * @param int $outcome
     * @return void
     * @dataProvider example1Provider
     */
    public function testGetHouses(string $input, int $outcome): void
    {
        $day3 = new Day3($input);
        $day3->process();
        self::assertSame($outcome, $day3->countHousesForSanta());
    }

    /**
     * @param string $input
     * @param int $outcome
     * @return void
     * @dataProvider example1Provider2
     */
    public function testGetHousesForSantaAndRobo(string $input, int $outcome): void
    {
        $day3 = new Day3($input);
        $day3->process();
        self::assertSame($outcome, $day3->countHousesForSantaAndRobo());
    }
}

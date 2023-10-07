<?php

declare(strict_types=1);

namespace Akoutroulis\AdventOfCodeSolutions\Tests\Y2015\Day1;

use Akoutroulis\AdventOfCodeSolutions\Y2015\Day1\Day1;
use PHPUnit\Framework\TestCase;

final class Day1Test extends TestCase
{
    public static function exampleProvider(): array
    {
        return [
            'example1' => ['(())', 0],
            'example2' => ['()()', 0],
            'example3' => ['(((', 3],
            'example4' => ['(()(()(', 3],
            'example5' => ['))(((((', 3],
            'example6' => ['())', -1],
            'example7' => ['))(', -1],
            'example8' => [')))', -3],
            'example9' => [')())())', -3],
        ];
    }


    public static function exampleProvider2(): array
    {
        return [
            'example1' => [')', 1],
            'example2' => ['()())', 5],
        ];
    }

    /**
     * @param string $input
     * @param int $output
     * @return void
     * @dataProvider  exampleProvider
     * @covers \Akoutroulis\AdventOfCodeSolutions\Y2015\Day1\Day1
     */
    public function testLogic(string $input, int $output): void
    {
        $solution = new Day1($input);
        $this->assertEquals($output, $solution->getFloor());
    }

    /**
     * @param string $input
     * @param int $outcome
     * @return void
     * @dataProvider exampleProvider2
     * @covers \Akoutroulis\AdventOfCodeSolutions\Y2015\Day1\Day1
     */
    public function testPart2(string $input, int $outcome): void
    {
        $solution = new Day1($input);
        $this->assertEquals($outcome, $solution->getBasementPosition());
    }
}
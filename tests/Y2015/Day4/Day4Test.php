<?php

declare(strict_types=1);

namespace Akoutroulis\AdventOfCodeSolutions\Tests\Y2015\Day4;

use Akoutroulis\AdventOfCodeSolutions\Y2015\Day4\Day4;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Akoutroulis\AdventOfCodeSolutions\Y2015\Day4\Day4
 */
final class Day4Test extends TestCase
{
    public static function exampleProvider(): array
    {
        return [
            'example1' => ['abcdef', 609043],
            'example2' => ['pqrstuv', 1048970]
        ];
    }

    /**
     * @param string $input
     * @param int $outcome
     * @return void
     * @dataProvider exampleProvider
     */
    public function testPart1(string $input, int $outcome): void
    {
        $day4 = new Day4($input);
        self::assertSame($outcome, $day4->calculateHash());
    }
}

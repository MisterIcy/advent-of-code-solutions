<?php

namespace Akoutroulis\AdventOfCodeSolutions\Tests\Y2015\Day6;

use Akoutroulis\AdventOfCodeSolutions\Helpers\Point2D;
use Akoutroulis\AdventOfCodeSolutions\Y2015\Day6\ActionEnum;
use Akoutroulis\AdventOfCodeSolutions\Y2015\Day6\Instruction;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Akoutroulis\AdventOfCodeSolutions\Y2015\Day6\Instruction
 */
class InstructionTest extends TestCase
{

    public static function exampleProvider(): array
    {
        return [
            'example1' => [
                'turn on 0,0 through 999,999',
                ActionEnum::TURN_ON,
                new Point2D(0, 0),
                new Point2D(999, 999)
            ],
            'example2' => ['toggle 0,0 through 999,0', ActionEnum::TOGGLE, new Point2D(0, 0), new Point2D(999, 0)],
            'example3' => [
                'turn off 499,499 through 500,500',
                ActionEnum::TURN_OFF,
                new Point2D(499, 499),
                new Point2D(500, 500)
            ]
        ];
    }

    /**
     * @param string $input
     * @param ActionEnum $actionEnum
     * @param Point2D $start
     * @param Point2D $end
     * @return void
     * @dataProvider exampleProvider
     */
    public function testInstructionCreation(
        string $input,
        ActionEnum $actionEnum,
        Point2D $start,
        Point2D $end
    ): void {
        $instruction = new Instruction($input);
        self::assertSame($actionEnum, $instruction->getAction());
        self::assertSame($start->getY(), $instruction->getStart()->getY());
        self::assertSame($start->getX(), $instruction->getStart()->getX());
        self::assertSame($end->getY(), $instruction->getEnd()->getY());
        self::assertSame($end->getX(), $instruction->getEnd()->getX());
    }
}

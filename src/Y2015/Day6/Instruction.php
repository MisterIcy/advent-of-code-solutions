<?php

namespace Akoutroulis\AdventOfCodeSolutions\Y2015\Day6;

use Akoutroulis\AdventOfCodeSolutions\Helpers\Point2D;

final class Instruction
{
    private const PATTERN = '/(?P<action>turn on|turn off|toggle)\s(?P<x1>\d+),(?P<y1>\d+)\s\w+\s(?P<x2>\d+),(?P<y2>\d+)/';
    private ActionEnum $action;
    private Point2D $start;
    private Point2D $end;

    public function __construct(string $instruction)
    {
        // Decode instruction
        $result = preg_match(self::PATTERN, $instruction, $matches);

        if ($result === false) {
            throw new \InvalidArgumentException('Invalid instruction');
        }

        $this->action = match ($matches['action']) {
            'turn on' => ActionEnum::TURN_ON,
            'turn off' => ActionEnum::TURN_OFF,
            'toggle' => ActionEnum::TOGGLE,
            default => throw new \InvalidArgumentException('Invalid action')
        };

        $this->start = new Point2D($matches['x1'], $matches['y1']);
        $this->end = new Point2D($matches['x2'], $matches['y2']);
    }

    public function getAction(): ActionEnum
    {
        return $this->action;
    }

    public function getStart(): Point2D
    {
        return $this->start;
    }

    public function getEnd(): Point2D
    {
        return $this->end;
    }
}
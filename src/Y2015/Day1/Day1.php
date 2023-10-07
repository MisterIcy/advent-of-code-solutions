<?php

declare(strict_types=1);

namespace Akoutroulis\AdventOfCodeSolutions\Y2015\Day1;

final class Day1
{
    public function __construct(private string $input)
    {
    }

    public function getFloor(): int
    {
        $floor = 0;
        for ($index = 0; $index < strlen($this->input); $index++) {
            $floor += $this->getDirection($this->input[$index]);
        }

        return $floor;
    }

    private function getDirection(string $direction): int
    {
        return match ($direction) {
            '(' => 1,
            ')' => -1,
            default => throw new \InvalidArgumentException(sprintf('Invalid direction %s', $direction)),
        };
    }

    public function getBasementPosition(): int
    {
        $floor = 0;
        for ($index = 0; $index < strlen($this->input); $index++) {
            $floor += $this->getDirection($this->input[$index]);

            if ($floor < 0) {
                return $index+1;
            }
        }

        return -1;
    }
}
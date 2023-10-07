<?php

namespace Akoutroulis\AdventOfCodeSolutions\Y2015\Day3;

use Akoutroulis\AdventOfCodeSolutions\Helpers\Point2D;

final class Day3
{
    private Point2D $normalSanta;
    private Point2D $santaWithRobo;
    private Point2D $robo;

    private array $normalHouses = ['0,0'];
    private array $santaRoboHouses = ['0,0'];

    public function __construct(private string $input)
    {
        $this->normalSanta = new Point2D();
        $this->santaWithRobo = new Point2D();
        $this->robo = new Point2D();
    }

    public function process(): void
    {
        for ($i = 0; $i < strlen($this->input); $i++) {
            $move = $this->input[$i];
            $this->move($move, $this->normalSanta);

            $this->normalHouses[] = $this->normalSanta->getPosition();

            if ($i % 2 == 0) {
                $this->move($move, $this->santaWithRobo);
                $this->santaRoboHouses[] = $this->santaWithRobo->getPosition();
            } else {
                $this->move($move, $this->robo);
                $this->santaRoboHouses[] = $this->robo->getPosition();
            }
        }
    }

    private function move(string $move, Point2D $actor): void
    {
        match ($move) {
            '^' => $actor->incrementY(),
            '<' => $actor->decrementX(),
            'v' => $actor->decrementY(),
            '>' => $actor->incrementX(),
            default => throw new \InvalidArgumentException('Unknown move ' . $move)
        };
    }

    public function countHousesForSanta(): int
    {
        return count(array_unique($this->normalHouses));
    }

    public function countHousesForSantaAndRobo(): int
    {
        return count(
            array_unique(
                $this->santaRoboHouses
            )
        );
    }
}
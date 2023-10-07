<?php

declare(strict_types=1);

namespace Akoutroulis\AdventOfCodeSolutions\Helpers;

final class Point2D
{

    public function __construct(private int $x = 0, private int $y = 0)
    {
    }

    public function incrementX(): self
    {
        $this->x++;
        return $this;
    }

    public function decrementX(): self
    {
        $this->x--;
        return $this;
    }

    public function incrementY(): self
    {
        $this->y++;
        return $this;
    }

    public function decrementY(): self
    {
        $this->y--;
        return $this;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function getPosition(): string
    {
        return $this->x . ',' . $this->y;
    }
}
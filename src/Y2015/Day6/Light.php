<?php

declare(strict_types=1);

namespace Akoutroulis\AdventOfCodeSolutions\Y2015\Day6;

final class Light
{
    private bool $state;
    private int $brightness = 0;

    public function __construct()
    {
        $this->state = false;
    }

    public function getState(): bool
    {
        return $this->state;
    }

    public function turnOn(): self
    {
        $this->state = true;
        return $this;
    }

    public function turnOff(): self
    {
        $this->state = false;
        return $this;
    }

    public function toggle(): self
    {
        $this->state = !$this->state;
        return $this;
    }

    public function increaseBrightness(int $amount = 1): self
    {
        $this->brightness += $amount;
        return $this;
    }

    public function decreaseBrightness(int $amount = 1): self
    {
        $this->brightness -= $amount;

        if ($this->brightness < 0) {
            $this->brightness = 0;
        }

        return $this;
    }

    public function getBrightness(): int
    {
        return $this->brightness;
    }
}
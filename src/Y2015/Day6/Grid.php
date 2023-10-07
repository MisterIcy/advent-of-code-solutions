<?php

declare(strict_types=1);

namespace Akoutroulis\AdventOfCodeSolutions\Y2015\Day6;

use http\Encoding\Stream\Deflate;
use http\Exception\RuntimeException;

final class Grid
{
    /**
     * @var Light[][]
     */
    private array $lights;

    /**
     * @var Instruction[]
     */
    private array $instructions;

    private int $numLights = 0;
    private int $brightness = 0;

    public function __construct(string $input)
    {
        for ($x = 0; $x < 1000; $x++) {
            for ($y = 0; $y < 1000; $y++) {
                $this->lights[$x][$y] = new Light();
            }
        }

        $instructions = explode("\n", $input);
        foreach ($instructions as $instruction) {
            $this->instructions[] = new Instruction($instruction);
        }
    }

    public function process(): self
    {
        foreach ($this->instructions as $instruction) {
            for ($x = $instruction->getStart()->getX(); $x <= $instruction->getEnd()->getX(); $x++) {
                for ($y = $instruction->getStart()->getY(); $y <= $instruction->getEnd()->getY(); $y++) {
                    match ($instruction->getAction()) {
                        ActionEnum::TURN_ON => $this->lights[$x][$y]->turnOn(),
                        ActionEnum::TURN_OFF => $this->lights[$x][$y]->turnOff(),
                        ActionEnum::TOGGLE => $this->lights[$x][$y]->toggle(),
                    };

                    match ($instruction->getAction()) {
                        ActionEnum::TURN_ON => $this->lights[$x][$y]->increaseBrightness(),
                        ActionEnum::TURN_OFF => $this->lights[$x][$y]->decreaseBrightness(),
                        ActionEnum::TOGGLE => $this->lights[$x][$y]->increaseBrightness(2),
                    };
                }
            }
        }


        for ($x = 0; $x < 1000; $x++) {
            for ($y = 0; $y < 1000; $y++) {
                $this->numLights += $this->lights[$x][$y]->getState() ? 1 : 0;
                $this->brightness += $this->lights[$x][$y]->getBrightness();
            }
        }

        return $this;
    }

    public function getNumLights(): int
    {
        return $this->numLights;
    }

    public function getBrightness(): int
    {
        return $this->brightness;
    }
}


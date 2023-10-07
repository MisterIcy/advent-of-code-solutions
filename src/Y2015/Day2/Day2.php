<?php

declare(strict_types=1);

namespace Akoutroulis\AdventOfCodeSolutions\Y2015\Day2;

final class Day2
{
    /**
     * @var BoxDimensions[]
     */
    private array $dimensions;

    public function __construct(string $data)
    {
        $this->dimensions = [];
        $dimensions = explode("\n", $data);
        foreach ($dimensions as $dimension) {
            $this->dimensions[] = new BoxDimensions($dimension);
        }
    }

    public function getDimensions(): int
    {
        $total = 0;
        foreach ($this->dimensions as $dimension) {
            $total += $dimension->getArea();
        }

        return $total;
    }

    public function getRibbonLength(): int
    {
        $total = 0;
        foreach ($this->dimensions as $dimension) {
            $total += $dimension->getRibbonLength();
        }

        return $total;
    }
}
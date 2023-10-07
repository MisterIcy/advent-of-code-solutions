<?php

declare(strict_types=1);

namespace Akoutroulis\AdventOfCodeSolutions\Y2015\Day2;

final class BoxDimensions
{
    private int $length;
    private int $width;
    private int $height;

    public function __construct(string $dimension)
    {
        $dim = explode('x', $dimension);
        $this->length = (int)$dim[0];
        $this->width = (int)$dim[1];
        $this->height = (int)$dim[2];
    }

    private function getMinDimension(): int
    {
        return min($this->length, $this->width, $this->height);
    }

    private function getSmallestSide(): int
    {
        return min($this->length * $this->width, $this->width * $this->height, $this->height * $this->length);
    }

    public function getArea(): int
    {
        return 2 * $this->length * $this->width +
            2 * $this->width * $this->height +
            2 * $this->height * $this->length + $this->getSmallestSide();
    }

    private function getTwoSmallest(): array
    {
        $dimensions = [$this->length, $this->width, $this->height];
        sort($dimensions);
        return [$dimensions[0], $dimensions[1]];
    }

    public function getRibbonLength(): int
    {
        return array_sum(
                array_map(function (int $element): int {
                    return $element + $element;
                }, $this->getTwoSmallest())
            ) +
            $this->length * $this->width * $this->height;
    }
}
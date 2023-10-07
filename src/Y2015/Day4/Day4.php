<?php

namespace Akoutroulis\AdventOfCodeSolutions\Y2015\Day4;

final class Day4
{
    private int $index;
    public function __construct(private readonly string $input)
    {
        $this->index = 0;
    }

    public function calculateHash(int $length = 5): int
    {
        while(true) {
            $hash = md5($this->input . $this->index);
            if (substr($hash, 0, $length) === str_repeat('0', $length)) {
                break;
            }
            $this->index++;
        }

        return $this->index;
    }
}
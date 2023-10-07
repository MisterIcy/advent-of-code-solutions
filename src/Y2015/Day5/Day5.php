<?php

declare(strict_types=1);

namespace Akoutroulis\AdventOfCodeSolutions\Y2015\Day5;

final class Day5
{
    /**
     * @var string[]
     */
    private array $strings;

    public function __construct(string $input)
    {
        $this->strings = explode("\n", $input);
    }

    public function processPart1(): int
    {
        $count = 0;
        foreach ($this->strings as $string) {
            if ($this->isNice($string)) {
                $count++;
            }
        }

        return $count;
    }

    public function processPart2(): int
    {
        $count = 0;
        foreach ($this->strings as $string) {
            if ($this->isNicePart2($string)) {
                $count++;
            }
        }

        return $count;
    }

    private function containsThreeVowels(string $str): bool
    {
        $array = array_filter(
            str_split($str),
            static function (string $element) {
                return in_array($element, ['a', 'e', 'i', 'o', 'u']);
            }
        );

        return count($array) >= 3;
    }

    private function twiceInARow(string $str): bool
    {
        for ($i = 1; $i < strlen($str); $i++) {
            if ($str[$i - 1] === $str[$i]) {
                return true;
            }
        }

        return false;
    }

    public function doesNotContainNaughty(string $str): bool
    {
        return !(str_contains($str, 'ab') ||
            str_contains($str, 'cd') ||
            str_contains($str, 'pq') ||
            str_contains($str, 'xy'));
    }

    public function isNice(string $string): bool
    {
        return $this->containsThreeVowels($string) &&
            $this->twiceInARow($string) &&
            $this->doesNotContainNaughty($string);
    }

    public function isNicePart2(string $input)
    {
        return $this->hasLetterInBetween($input) &&
            $this->hasPairs($input);
    }

    private function hasPairs(string $input)
    {
        $pairs = [];

        for ($i = 1; $i < strlen($input); $i++) {
            $pairs[] = $input[$i - 1] . $input[$i];
        }

        foreach ($pairs as $pair) {
            $result = preg_match_all(sprintf('/(%s)/', $pair), $input, $matches);
            if ($result < 2) {
                continue;
            }

            return true;
        }

        return false;
    }

    private function hasLetterInBetween(string $str): bool
    {
        $array = array_map(static function (string $element): int {
            return ord($element);
        }, str_split($str));

        if (count($array) < 2) {
            return false;
        }


        for ($i = 2; $i < count($array); $i++) {
            if ($array[$i] === $array[$i - 2]) {
                return true;
            }
        }

        return false;
    }
}
<?php

declare(strict_types=1);

namespace Akoutroulis\AdventOfCodeSolutions\Tests\Y2015\Day6;

use Akoutroulis\AdventOfCodeSolutions\Y2015\Day6\Light;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Akoutroulis\AdventOfCodeSolutions\Y2015\Day6\Light
 */
final class LightTest extends TestCase
{
    public function testTurnOn(): void
    {
        $light = new Light();
        $light->turnOn();
        self::assertTrue($light->getState());
    }

    public function testToggle(): void
    {
        $light = new Light();
        $light->toggle();
        self::assertTrue($light->getState());
    }

    public function testToggleWhenTurnedOn(): void
    {
        $light = new Light();
        $light->turnOn();
        $light->toggle();
        self::assertFalse($light->getState());
    }

    public function testTurnOff(): void
    {
        $light = new Light();
        $light->toggle();
        self::assertTrue($light->getState());
        $light->turnOff();
        self::assertFalse($light->getState());
    }
}

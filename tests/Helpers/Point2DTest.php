<?php

namespace Akoutroulis\AdventOfCodeSolutions\Tests\Helpers;

use Akoutroulis\AdventOfCodeSolutions\Helpers\Point2D;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Akoutroulis\AdventOfCodeSolutions\Helpers\Point2D
 */
class Point2DTest extends TestCase
{

    public function testIncrementX(): void
    {
        $point = new Point2D();
        $point->incrementX();
        self::assertSame(1, $point->getX());
    }

    public function testIncrementY(): void
    {
        $point = new Point2D();
        $point->incrementY();
        self::assertSame(1, $point->getY());
    }

    public function testDecrementX(): void
    {
        $point = new Point2D();
        $point->decrementX();
        self::assertSame(-1, $point->getX());
    }

    public function testDecrementY(): void
    {
        $point = new Point2D();
        $point->decrementY();
        self::assertSame(-1, $point->getY());
    }
}

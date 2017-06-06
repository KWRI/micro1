<?php
declare(strict_types=1);

namespace Tests;

use App\Http\Controllers\FibonacciController;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class FibonacciTest extends TestCase
{
    public function testFibonacciFullReturnsArray()
    {
        $fibonacci = new FibonacciController();
        $full = $fibonacci->full();
        $this->assertTrue(is_array($full));
    }

    public function testFibonacciPositionParameterMustBeInteger()
    {
        $this->expectException(\TypeError::class);
        $fibonacci = new FibonacciController();
        $fibonacci->position('bad');
    }

    public function testFibonacciPositionReturnsCorrectInteger()
    {
        $fibonacci = new FibonacciController();
        $positionFive = $fibonacci->position(5);
        $this->assertSame(5, $positionFive);
    }
}

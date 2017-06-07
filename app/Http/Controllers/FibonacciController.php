<?php

namespace App\Http\Controllers;

use Cache;
use DB;

class FibonacciController extends Controller
{
    // Calculate Fibonacci sequence until $end then return
    private function _calculateFibonacci(int $end = 92): array
    {
        $fibArray = array(0, 1);
        for ($i = 2; $i <= $end; $i++) {
            $fibArray[$i] = $fibArray[$i-1] + $fibArray[$i-2];
        }
        return $fibArray;
    }

    // Return full Fibonacci sequence
    public function full(): array
    {
        return $this->_calculateFibonacci();
    }

    // Get specific position in Fibonacci sequence
    // TODO: Currently using zero based index
    public function position(int $position): int
    {
        // After position 92 the result turns into float instead of integer
        if ($position > 92) {
            $position = 92;
        }

        $return = Cache::store('database')->remember($position, '60', function () use ($position) {
            return $this->_calculateFibonacci($position)[$position];
        });
        return $return;
    }

    public function showCache()
    {
        return DB::table('cache')->pluck('key');
    }
}

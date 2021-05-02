<?php

namespace Tests\Unit;

use App\Http\Controllers\ExampleController;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $a = 2;
        $b = 3;
        $c = $a * $b;

        $co = new ExampleController();

        $result = $co->hitung($a, $b);
        $this->assertEquals($c, $result);
    }
}

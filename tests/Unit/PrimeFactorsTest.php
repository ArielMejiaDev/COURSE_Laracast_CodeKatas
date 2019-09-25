<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PrimeFactorsTest extends TestCase
{
    
    public $number;

    /**
     * It generate a test input
     * 
     * @param int $number
     * 
     * @return TestCase
     */
    public function generate($int)
    {
        $this->number = $int;
        return $this;
    }

    /**
     * It returns an array with primeFactors
     * 
     * @return array $primeFactors
     */
    public function shouldReturn($expected)
    {
        $result = [];
        if ($this->number > 1) {
            $result[] = $this->number;
        }
        return $result;
        // if ($this->number == 1) $result = [];
        // if ($this->number == 2) $result = [2];
        // if ($this->number == 3) $result = [3];
        // if ($this->number == 4) $result = [2, 2];
        //return $this->assertEquals($expected, $result);
    }

    /**
     * A basic unit test example.
     * 
     * @test
     *
     * @return void
     */
    public function test_return_an_empty_array_for_one()
    {
        $result = $this->generate(1)->shouldReturn([]);
        $this->assertTrue($result);
    }

    public function test_return_2_for_2()
    {
        $result = $this->generate(2)->shouldReturn([2]);
        $this->assertTrue($result);
    }

    public function test_it_returns_3_for_3()
    {
        $result = $this->generate(3)->shouldReturn([3]);
        $this->assertTrue($result);
    }

    // public function test_it_returns_2_and_2_for_4()
    // {
    //     $this->generate(4)->shouldReturn([2,2]);
    //     $this->assertTrue($result);
    // }

}

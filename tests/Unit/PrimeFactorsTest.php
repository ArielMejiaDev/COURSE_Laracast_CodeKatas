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

        for ($divisor = 2; $this->number > 1; $divisor++) { 
            
            for (; $this->number % $divisor == 0; $this->number /= $divisor) {
                $result[] = $divisor;
            }

        }

        return $this->assertEquals($expected, $result);
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
        $this->generate(1)->shouldReturn([]);
    }

    public function test_return_2_for_2()
    {
        $this->generate(2)->shouldReturn([2]);
    }

    public function test_it_returns_3_for_3()
    {
        $this->generate(3)->shouldReturn([3]);
    }

    public function test_it_returns_2_and_2_for_4()
    {
        $this->generate(4)->shouldReturn([2,2]);
    }

    public function test_it_returns_5_for_5()
    {
        $this->generate(5)->shouldReturn([5]);
    }

    public function test_it_returns_2_and_3_for_6()
    {
        $this->generate(6)->shouldReturn([2, 3]);
    }

    public function test_it_returns_2_2_2_for_8()
    {
        $this->generate(8)->shouldReturn([2, 2, 2]);
    }

    public function test_it_returns_3_3_for_9()
    {
        $this->generate(9)->shouldReturn([3, 3]);
    }

    public function test_it_returns_2_2_5_5_for_100()
    {
        $this->generate(100)->shouldReturn([2, 2, 5, 5]);
    }

}

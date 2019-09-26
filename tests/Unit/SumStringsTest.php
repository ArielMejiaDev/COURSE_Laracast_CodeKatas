<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SumStringsTest extends TestCase
{

    protected $numbers;

    public function add($number): SumStringsTest
    {
        $this->numbers = $number;
        return $this;    
    }

    public function isInvalidNumber($number): bool
    {
        return $number < 0 || $number >= 1000;
    }

    public function trimStrings($number): int
    {
        return (int) preg_replace("/[^0-9]/", '', $number);
    }

    public function shouldEquals($expected)
    {
        $this->numbers = explode(',', $this->numbers);

        $arraySum = array_sum(array_map(function($number){
            if ($this->isInvalidNumber($number)) $number = 0;
            return $this->trimStrings($number); 
        }, $this->numbers));

        $this->assertEquals($expected, $arraySum);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_sum_one_string_value()
    {
        $this->add('2')->shouldEquals(2);
    }

    public function test_sum_empty_string_value_returns_0()
    {
        $this->add('')->shouldEquals(0);
    }

    public function test_sum_multiple_string_value()
    {
        $this->add('2, 2')->shouldEquals(4);
    }

    public function test_sum_negative_string_value()
    {
        $this->add('2, -2')->shouldEquals(2);
    }

    public function test_escape_string_value()
    {
        $this->add('2, /2')->shouldEquals(4);
    }

    public function test_max_string_value_is_1000()
    {
        $this->add('2, 2, 1000')->shouldEquals(4);
    }

}

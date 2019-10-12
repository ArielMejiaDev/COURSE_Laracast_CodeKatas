<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FizzBuzzTest extends TestCase
{

    public $number;
    /**
     * It sets the value to eval
     */
    public function generate($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * it execute the function to fizzbuzz
     */
    public function shouldReturn($expected)
    {
        $result = $this->number;
        if ($result % 15 == 0 ) {
            return $this->assert($expected, 'fizzbuzz');
        }
        if ($result % 5 == 0 ) {
            return $this->assert($expected, 'buzz');
        }
        if ($result % 3 == 0 ) {
            return $this->assert($expected, 'fizz');
        }

        return $this->assertEquals($expected, $result);
    }

    public function assert($expected, $value)
    {
        return $this->assertEquals($expected, $value);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_number_one_returns_one()
    {
        $this->generate(1)->shouldReturn(1);
    }

    public function test_number_two_returns_two()
    {
        $this->generate(2)->shouldReturn(2);
    }

    public function test_number_three_returns_fizz()
    {
        $this->generate(3)->shouldReturn('fizz');
    }

    public function test_number_four_returns_four()
    {
        $this->generate(4)->shouldReturn(4);
    }

    public function test_number_five_returns_buzz()
    {
        $this->generate(5)->shouldReturn('buzz');
    }

    public function test_number_fifteen_returns_fizzbuzz()
    {
        $this->generate(15)->shouldReturn('fizzbuzz');
    }

}

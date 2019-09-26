<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RomanNumeralsConverterTest extends TestCase
{

    // 1  => I 
    // 2  => II 
    // 3  => III 
    // 4  => IV 
    // 5  => V 
    // 6  => VI 
    // 7  => VII 
    // 8  => VIII 
    // 9  => IX 
    // 10 => X

    protected $number;

    protected $lookup = [
        10 => 'X',
        9  => 'IX',
        5  => 'V',
        4  => 'IV',
        1  => 'I'
    ];

    public function convert(int $number):RomanNumeralsConverterTest
    {
        $this->number = $number;
        return $this;
    }

    public function shouldReturn(string $string):void
    {
        $romanNumber = '';
        foreach ($this->lookup as $keyLimit => $valueString) {
            while ($this->number >= $keyLimit) {
                $romanNumber .= $valueString;
                $this->number -= $keyLimit;
            }
        }

        $this->assertEquals($string, $romanNumber);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_convert_1_to_I()
    {
        $this->convert(1)->shouldReturn('I');
    }

    public function test_convert_2_to_II()
    {
        $this->convert(2)->shouldReturn('II');
    }

    public function test_convert_3_to_III()
    {
        $this->convert(3)->shouldReturn('III');
    }

    public function test_convert_4_to_IV()
    {
        $this->convert(4)->shouldReturn('IV');
    }

    public function test_convert_5_to_V()
    {
        $this->convert(5)->shouldReturn('V');
    }

    public function test_convert_6_to_VI()
    {
        $this->convert(6)->shouldReturn('VI');
    }

    public function test_convert_9_to_IX()
    {
        $this->convert(9)->shouldReturn('IX');
    }

    public function test_convert_10_to_X()
    {
        $this->convert(10)->shouldReturn('X');
    }

}

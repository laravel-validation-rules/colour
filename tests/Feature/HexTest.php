<?php

namespace LVR\Colour\Tests\Feature;

use LVR\Colour\Hex;
use LVR\Colour\Tests\TestCase;
use Validator;

class HexTest extends TestCase
{
    /**
     * @param       $colour
     *
     * @param array $params
     *
     * @return \Illuminate\Validation\Validator
     */
    protected function validator($colour, ...$params)
    {
        return Validator::make(['colour' => $colour], ['colour' => ['required', new Hex(...$params)]]);
    }

    /** @test */
    public function six_characters_with_hash()
    {
        $this->assertTrue($this->validator('#ff0080')->passes());
        $this->assertTrue($this->validator('#fg0080')->fails());

        $this->assertTrue($this->validator('#ff0080', true)->passes()); // hash
        $this->assertTrue($this->validator('#ff0080', false, true)->passes()); // full
    }

    /** @test */
    public function six_characters_without_hash()
    {
        $this->assertTrue($this->validator('ff0080')->passes());
        $this->assertTrue($this->validator('fg0080')->fails());

        $this->assertTrue($this->validator('ff0080', true)->fails()); // hash
        $this->assertTrue($this->validator('ff0080', false, true)->passes()); // full
    }

    /** @test */
    public function three_characters_with_hash()
    {
        $this->assertTrue($this->validator('#fff')->passes());
        $this->assertTrue($this->validator('#ggg')->fails());

        $this->assertTrue($this->validator('#fff', true)->passes()); // hash
        $this->assertTrue($this->validator('#fff', false, true)->fails()); // full
    }

    /** @test */
    public function three_characters_without_hash()
    {
        $this->assertTrue($this->validator('fff')->passes());
        $this->assertTrue($this->validator('ggg')->fails());

        $this->assertTrue($this->validator('fff', true)->fails()); // hash
        $this->assertTrue($this->validator('fff', false, true)->fails()); // full
    }
}

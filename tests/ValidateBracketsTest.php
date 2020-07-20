<?php

use PHPUnit\Framework\TestCase;

class ValidateBracketsTest extends TestCase
{
    public function testValidate_bracketsEmptyString()
    {
        $result = validate_brackets('');
        $this->assertFalse($result);
    }

    public function testValidate_bracketsWrongChar()
    {
        $result = validate_brackets('{}()[]WW');
        $this->assertFalse($result);

        $result = validate_brackets('{W}');
        $this->assertFalse($result);
    }

    public function testValidate_bracketsWrongFirstBracket()
    {
        $result = validate_brackets(')(');
        $this->assertFalse($result);

        $result = validate_brackets('][');
        $this->assertFalse($result);

        $result = validate_brackets('}{');
        $this->assertFalse($result);
    }

    public function testValidate_bracketsCorrect()
    {
        $result = validate_brackets('(){}[]');
        $this->assertTrue($result);

        $result = validate_brackets('([{}])');
        $this->assertTrue($result);
    }

    public function testValidate_bracketsWrong()
    {
        $result = validate_brackets('(}');

        $this->assertFalse($result);

        $result = validate_brackets('[(])');

        $this->assertFalse($result);

        $result = validate_brackets('[({})](]');

        $this->assertFalse($result);
    }
}

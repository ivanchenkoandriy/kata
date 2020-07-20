<?php

use PHPUnit\Framework\TestCase;

class ValidateParenthesesTest extends TestCase
{
    public function testValidate_parenthesesEmptyString()
    {
        $result = validate_parentheses('');
        $this->assertFalse($result);
    }

    public function testValidate_parenthesesWrongFirstParenthese()
    {
        $result = validate_parentheses(')(');
        $this->assertFalse($result);
    }

    public function testValidate_parenthesesCorrect()
    {
        $result = validate_parentheses('()');
        $this->assertTrue($result);

        $result = validate_parentheses('(())((()())())');
        $this->assertTrue($result);
    }

    public function testValidate_parenthesesWrong()
    {
        $result = validate_parentheses(')(()))');
        $this->assertFalse($result);

        $result = validate_parentheses(')');
        $this->assertFalse($result);
    }
}

<?php

use PHPUnit\Framework\TestCase;

class BasicsTest extends TestCase
{
    /**
     * @see https://www.php.net/manual/en/language.constants.predefined.php
     */
    public function testMagicConstants()
    {
        // The current line number of the file.
        $this->assertEquals(13, __LINE__);

        // The function name, or {closure} for anonymous functions.
        $this->assertEquals('testMagicConstants', __FUNCTION__);

        // The function name, or {closure} for anonymous functions.
        $this->assertEquals('BasicsTest', __CLASS__);

        // The class method name.
        $this->assertEquals('BasicsTest::testMagicConstants', __METHOD__);
        
        // The name of the current namespace.
        $this->assertEquals('', __NAMESPACE__);

    }

    /**
     * @see https://www.php.net/manual/en/language.types.boolean.php
     */
    public function testConvertingToBoolean()
    {
        // Positive integers
        $this->assertEquals(true, (bool) 1);
        $this->assertEquals(true, (bool) 10);

        // Negative integers
        $this->assertEquals(true, (bool) -1);
        $this->assertEquals(true, (bool) -10);
        $this->assertEquals(false, (bool) 0);


        // Strings
        $this->assertEquals(false, (bool) '');
        $this->assertEquals(true, (bool) 'false');
        $this->assertEquals(true, (bool) 'not empty string');

        // Arrays
        $this->assertEquals(false, (bool) []);
        $this->assertEquals(true, (bool) [1, 2, 3]);

        // Null
        $this->assertEquals(false, (bool) null);
    }

    /**
     * @see https://www.php.net/manual/en/language.operators.arithmetic.php
     */
    public function testArithmeticOperators()
    {
        // Addition
        $this->assertEquals(3, 1 + 2);

        // Subtraction
        $this->assertEquals(1, 2 - 1);

        // Multiplication
        $this->assertEquals(15, 5 * 3);

        // Division
        $this->assertEquals(50, 150 / 3);

        // Modulo
        $this->assertEquals(0, 10 % 2);
        $this->assertEquals(1, 11 % 2);

        // Exponentiation
        $this->assertEquals(36, 6**2);
    }

    /**
     * @see https://www.php.net/manual/en/language.operators.precedence.php
     */
    public function testOperatorsPrecedence()
    {
        $a = 1;
        $b = 2;
        $a = $b += 3;

        $this->assertEquals(5, $a);
    }

    /**
     * @see https://www.php.net/manual/en/language.types.type-juggling.php
     */
    public function testTypeJuggling()
    {
        $foo = '1';
        $this->assertIsString($foo);

        $foo *= 2;
        $this->assertIsInt($foo);

        $foo = $foo * 1.3;
        $this->assertIsInt($foo);

        $foo = 5 * (int) '10 Little Piggies';
        $this->assertIsInt($foo);

        $foo = 5 * (int) '10 Small Pigs';
        $this->assertIsInt($foo);
    }
}
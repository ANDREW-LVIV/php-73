<?php

use PHPUnit\Framework\TestCase;

class StringsTest extends TestCase
{
    /**
     * @see https://www.php.net/manual/en/language.types.string.php
     */
    public function testVariableParsing()
    {
        $foo = 'world';

        // Double quotes.
        $this->assertEquals('Hello world', "Hello $foo");

        // Single quotes.
        $this->assertEquals('Hello $foo', 'Hello $foo');

        $this->assertEquals('Hello world', "Hello ${foo}");

        $this->assertEquals('Hello world', "Hello " . $foo);

        // Heredoc
        $this->assertEquals('Hello world', <<<DOC
        Hello $foo
        DOC);

        // Nowdoc
        $this->assertEquals('Hello $foo', <<<'DOC'
        Hello $foo
        DOC);
    }

    /**
     * @see https://www.php.net/manual/en/ref.strings.php
     */
    public function testStringFunctions()
    {
        // trim — Strip whitespace (or other characters) from the beginning and end of a string
        $this->assertEquals('Hello', trim('Hello         '));
        $this->assertEquals('Hello', trim('Hello......', '.'));

        // ltrim — Strip whitespace (or other characters) from the beginning of a string
        $this->assertEquals('Hello ', ltrim(' Hello '));

        // rtrim — Strip whitespace (or other characters) from the end of a string
        $this->assertEquals(' Hello', rtrim(' Hello '));

        // strtoupper — Make a string uppercase
        $this->assertEquals('HELLO', strtoupper('hello'));

        // strtolower — Make a string lowercase
        $this->assertEquals('hello', strtolower('HeLlO'));

        // ucfirst — Make a string's first character uppercase
        $this->assertEquals('Hello there', ucfirst('hello there'));

        // lcfirst — Make a string's first character lowercase
        $this->assertEquals('hELLO', lcfirst('HELLO'));

        // strip_tags — Strip HTML and PHP tags from a string
        $this->assertEquals('color is blue size is huge', strip_tags('<p style="color:blue;">color is blue</p> <p>size is <span style="font-size:200%;">huge</span></p>'));

        // htmlspecialchars — Convert special characters to HTML entities
        $this->assertEquals('&lt;b&gt;bold&lt;/b&gt; text', htmlspecialchars('<b>bold</b> text'));

        // addslashes — Quote string with slashes
        $this->assertEquals('\"yolo\" - You Only Live Once', addslashes('"yolo" - You Only Live Once'));

        // strcmp — Binary safe string comparison
        $this->assertEquals(-1, strcmp("WorLD","wOrLD"));

        // strncasecmp — Binary safe case-insensitive string comparison of the first n characters
        $this->assertEquals(0, strncasecmp("WorLD","wOrLD", 5));

        // str_replace — Replace all occurrences of the search string with the replacement string
        $this->assertEquals('My name is Andrew', str_replace("Bill","Andrew", 'My name is Bill'));

        // strpos — Find the position of the first occurrence of a substring in a string
        $this->assertEquals(2, strpos("I love Lviv, I love Lviv too!","l"));

        // strstr — Find the first occurrence of a string
        $this->assertEquals('www.andrew-lviv.net', strstr("http://www.andrew-lviv.net","www"));

        // strrchr — Find the last occurrence of a character in a string
        $this->assertEquals('/logo.gif', strrchr("http://www.andrew-lviv.net/logo.gif","/"));

        // substr — Return part of a string
        $this->assertEquals("Lviv", substr("I'm from Lviv", -4));

        // sprintf — Return a formatted string
        $this->assertEquals('Посилання на сайт: <a href="https://yahoo.com">yahoo.com</a>', sprintf("Посилання на сайт: %syahoo.com%s", '<a href="https://yahoo.com">', '</a>'));
    }
}
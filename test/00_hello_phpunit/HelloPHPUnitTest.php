<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
require_once(__DIR__ . "/../../src/00_hello_phpunit/HelloPHPUnit.php");

use exp\src\HelloPHPUnit;

class HelloPHPUnitTest extends TestCase
{
    private $hello;

    protected function setUp(): void {
        $this->hello = new HelloPHPUnit();
    }

    public function testCanSayHelloWorld() {
        $this->assertEquals("Hello world! I'm PHPUnit.", $this->hello->sayHello());
    }

    public function testCanSayHelloName() {
        $name = "Tai Vu";
        $this->assertEquals("Hello $name! I'm PHPUnit.", $this->hello->sayHello($name));
    }
}

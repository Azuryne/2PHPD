<?php
namespace Test;

//require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';


use PHPUnit\Framework\TestCase;
use Classes\Person;


class TestTest extends TestCase {
    public function setUp() : void{
        $this->Person = new Person('TestPerson');
    }
    public function tearDown() : void{
        unset($this->Person);
    }
    public function testAddMoney(){
        $input = 4;
        $this->Person->addMoney($input);
        $output = $this->Person->money;
        $this->assertEquals(4, $output);
    }
}
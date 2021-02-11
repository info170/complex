<?php

require 'Complex.php';

use PHPUnit\Framework\TestCase;

class ComplexTests extends TestCase
{
    private $complex;

    protected function setUp()
    {
        $this->complex = new Complex();
    }

    protected function tearDown()
    {
        $this->complex = NULL;
    }

    public function testSum()
    {
        $result = $this->complex->sum('5+2i', '2-5i');
        $this->assertEquals('7-3i', $result);
    }

    public function testSub()
    {
        $result = $this->complex->sub('5+2i', '2-5i');
        $this->assertEquals('3+7i', $result);
    }

    public function testAdd()
    {
        $result = $this->complex->add('5+2i', '2-5i');
        $this->assertEquals('20-21i', $result);
    }

    public function testDiv()
    {
        $result = $this->complex->div('5+2i', '2-5i');
        $this->assertEquals('i', $result);
    }

}

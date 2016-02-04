<?php
namespace ddbbunit\http;

use ddbbunit\TestCase;
use ddbb\http\Request;

class RequestTest extends TestCase
{
    public function testSetParam()
    {
        $request = new Request();
        
        $request->setParam('name', 'benben');
        $this->assertEquals('benben', $request->getParam('name'));

        $request->setParam('name', 'hello');
        $this->assertEquals('hello', $request->getParam('name'));
        $this->assertEquals('hello', $request->getQuery('name'));
        $this->assertEquals('hello', $request->getPost('name'));
        
        $request->setParam('age', 12);
        $this->assertEquals(12, $request->getParam('age'));
        $this->assertEquals(12, $request->getQuery('age'));
        $this->assertEquals(12, $request->getPost('age'));
    }
}
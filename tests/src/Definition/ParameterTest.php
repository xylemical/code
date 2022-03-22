<?php

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;

class ParameterTest extends TestCase {

  public function testParameter() {
    $a = Parameter::create('dummy');
    $b = Parameter::create('dummy');
    $c = Parameter::create('test');

    $this->assertEquals($a, $b);
    $this->assertNotEquals($a, $c);
  }

}

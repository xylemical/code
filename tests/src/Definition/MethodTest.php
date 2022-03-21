<?php

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;

class MethodTest extends TestCase {

  public function testMethod() {
    $a = Method::create('dummy');
    $b = Method::create('dummy');
    $c = Method::create('test');

    $this->assertEquals($a, $b);
    $this->assertNotEquals($a, $c);
  }

}

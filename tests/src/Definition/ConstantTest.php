<?php

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;
use Xylemical\Code\Expression;

class ConstantTest extends TestCase {

  public function testConstant() {
    $a = Constant::create('dummy', new Expression());
    $b = Constant::create('dummy', new Expression());
    $c = Constant::create('test', new Expression());

    $this->assertEquals($a, $b);
    $this->assertNotEquals($a, $c);
  }

}

<?php

namespace Xylemical\Code;

use PHPUnit\Framework\TestCase;

class ExpressionTest extends TestCase {

  public function testExpression() {
    $contents = 'test contents';
    $obj = new Expression($contents);
    $this->assertEquals($contents, $obj->getContents());
    $this->assertFalse($obj->isEmpty());

    $obj = new Expression();
    $this->assertEquals('', $obj->getContents());
    $this->assertNotEquals($contents, $obj->getContents());
    $this->assertTrue($obj->isEmpty());

    $obj = Expression::create($contents);
    $this->assertEquals($contents, $obj->getContents());
  }

}

<?php

namespace Xylemical\Code;

use PHPUnit\Framework\TestCase;

class ExpressionTest extends TestCase {

  public function testExpression() {
    $contents = 'test contents';
    $obj = new Expression($contents);
    $this->assertEquals($contents, $obj->getCode()->getContents());
    $this->assertEquals('php', $obj->getCode()->getLanguage());
    $this->assertFalse($obj->isEmpty());

    $obj = new Expression();
    $this->assertEquals('', $obj->getCode()->getContents());
    $this->assertNotEquals($contents, $obj->getCode()->getContents());
    $this->assertTrue($obj->isEmpty());

    $obj = Expression::create($contents);
    $this->assertEquals($contents, (string) $obj->getCode());
  }

}

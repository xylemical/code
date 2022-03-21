<?php

namespace Xylemical\Code;

use PHPUnit\Framework\TestCase;

class ValueTraitTest extends TestCase {

  public function testValue() {
    $obj = $this->getObjectForTrait(ValueTrait::class);

    $this->assertEquals(Expression::class, get_class($obj->getValue()));

    $value = $this->getMockBuilder(ExpressionInterface::class)
      ->getMock();

    $obj->setValue($value);
    $this->assertEquals($value, $obj->getValue());
  }

}

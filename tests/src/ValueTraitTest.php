<?php

namespace Xylemical\Code;

use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

class ValueTraitTest extends TestCase {

  use ProphecyTrait;

  public function testValue() {
    $obj = $this->getObjectForTrait(ValueTrait::class);

    $this->assertEquals(Expression::class, get_class($obj->getValue()));
    $this->assertFalse($obj->hasValue());

    $value = $this->prophesize(ExpressionInterface::class);
    $value->isEmpty()->willReturn(FALSE);
    $value = $value->reveal();

    $obj->setValue($value);
    $this->assertEquals($value, $obj->getValue());
    $this->assertTrue($obj->hasValue());
  }

}

<?php

declare(strict_types=1);

namespace Xylemical\Code;

use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

/**
 * Tests \Xylemical\Code\ValueTrait.
 */
class ValueTraitTest extends TestCase {

  use ProphecyTrait;

  /**
   * Tests sanity.
   */
  public function testValue(): void {
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

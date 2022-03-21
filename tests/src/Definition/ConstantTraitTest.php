<?php

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;
use Xylemical\Code\Expression;

class ConstantTraitTest extends TestCase {

  public function testConstant() {
    $obj = $this->getObjectForTrait(ConstantTrait::class);
    $value = new Expression();

    $this->assertNull($obj->getConstant('test'));

    $a = new Constant('Test\\Trait', $value);
    $b = new Constant('Test\\Sequence', $value);

    $obj->setConstants([$a, $b]);

    $this->assertNull($obj->getConstant('test'));
    $this->assertEquals($a, $obj->getConstant('Test\\Trait'));
    $this->assertEquals($b, $obj->getConstant('Test\\Sequence'));

    $c = new Constant('Test', $value);
    $obj->addConstants([$c]);
    $this->assertEquals($c, $obj->getConstant('Test'));
    $this->assertEquals($c, $obj->getConstant('test'));
    $this->assertEquals($a, $obj->getConstant('Test\\Trait'));

    $obj->removeConstant('Test\\Sequence');
    $this->assertNull($obj->getConstant('Test\\Sequence'));

    $obj->setConstants([$c]);
    $this->assertEquals($c, $obj->getConstant('Test'));
    $this->assertNull($obj->getConstant('Test\\Trait'));

    $obj->removeConstant('test');
    $this->assertNull($obj->getConstant('Test'));
  }

}

<?php

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;

class MethodTraitTest extends TestCase {

  public function testMethod() {
    $obj = $this->getObjectForTrait(MethodTrait::class);

    $this->assertNull($obj->getMethod('test'));

    $a = new Method('Test\\Trait');
    $b = new Method('Test\\Sequence');

    $obj->setMethods([$a, $b]);

    $this->assertNull($obj->getMethod('test'));
    $this->assertEquals($a, $obj->getMethod('Test\\Trait'));
    $this->assertEquals($b, $obj->getMethod('Test\\Sequence'));

    $c = new Method('Test');
    $obj->addMethods([$c]);
    $this->assertEquals($c, $obj->getMethod('Test'));
    $this->assertEquals($c, $obj->getMethod('test'));
    $this->assertEquals($a, $obj->getMethod('Test\\Trait'));
    $this->assertEquals([$a, $b, $c], $obj->getMethods());

    $obj->removeMethod('Test\\Sequence');
    $this->assertNull($obj->getMethod('Test\\Sequence'));

    $obj->setMethods([$c]);
    $this->assertEquals($c, $obj->getMethod('Test'));
    $this->assertNull($obj->getMethod('Test\\Trait'));

    $obj->removeMethod('test');
    $this->assertNull($obj->getMethod('Test'));
  }

}

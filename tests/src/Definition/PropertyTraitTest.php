<?php

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;

class PropertyTraitTest extends TestCase {

  public function testProperty() {
    $obj = $this->getObjectForTrait(PropertyTrait::class);

    $this->assertNull($obj->getProperty('test'));
    $this->assertFalse($obj->hasProperties());

    $a = new Property('Test\\Trait');
    $b = new Property('Test\\Sequence');

    $obj->setProperties([$a, $b]);

    $this->assertNull($obj->getProperty('test'));
    $this->assertEquals($a, $obj->getProperty('Test\\Trait'));
    $this->assertEquals($b, $obj->getProperty('Test\\Sequence'));
    $this->assertTrue($obj->hasProperties());

    $c = new Property('Test');
    $obj->addProperties([$c]);
    $this->assertEquals($c, $obj->getProperty('Test'));
    $this->assertEquals($c, $obj->getProperty('test'));
    $this->assertEquals($a, $obj->getProperty('Test\\Trait'));
    $this->assertEquals([$a, $b, $c], $obj->getProperties());

    $obj->removeProperty('Test\\Sequence');
    $this->assertNull($obj->getProperty('Test\\Sequence'));

    $obj->setProperties([$c]);
    $this->assertEquals($c, $obj->getProperty('Test'));
    $this->assertNull($obj->getProperty('Test\\Trait'));

    $obj->removeProperty('test');
    $this->assertNull($obj->getProperty('Test'));
  }

}

<?php

namespace Xylemical\Code;

use PHPUnit\Framework\TestCase;

class TypeTraitTest extends TestCase {

  public function testType() {
    $obj = $this->getObjectForTrait(TypeTrait::class);

    $this->assertEquals(FullyQualifiedName::class, get_class($obj->getType()));
    $this->assertEquals('', (string) $obj->getType());
    $this->assertFalse($obj->hasType());

    $name = '\\Test\\Object';
    $name = new FullyQualifiedName($name);

    $obj->setType($name);
    $this->assertEquals((string) $name, (string) $obj->getType());
    $this->assertEquals($name, $obj->getType());
    $this->assertTrue($obj->hasType());
  }

}

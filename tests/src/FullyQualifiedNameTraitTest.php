<?php

namespace Xylemical\Code;

use PHPUnit\Framework\TestCase;

class FullyQualifiedNameTraitTest extends TestCase {

  public function testFullyQualifiedName() {
    $obj = $this->getObjectForTrait(FullyQualifiedNameTrait::class);

    $this->assertEquals(FullyQualifiedName::class, get_class($obj->getFullyQualifiedName()));
    $this->assertEquals('', $obj->getName());

    $name = 'Test\\Object';
    $obj->setName($name);
    $this->assertEquals($name, $obj->getName());
    $this->assertequals($name, (string) $obj->getFullyQualifiedName());

    $name = new FullyQualifiedName($name);

    $obj->setFullyQualifiedName($name);
    $this->assertEquals((string) $name, $obj->getName());
    $this->assertEquals((string) $name, (string) $obj->getFullyQualifiedName());
  }

}

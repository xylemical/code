<?php

namespace Xylemical\Code;

use PHPUnit\Framework\TestCase;

class DocumentationTraitTest extends TestCase {

  public function testDocumentation() {
    $obj = $this->getObjectForTrait(DocumentationTrait::class);

    $this->assertEquals(Documentation::class, get_class($obj->getDocumentation()));

    $value = $this->getMockBuilder(DocumentationInterface::class)
      ->getMock();

    $obj->setDocumentation($value);
    $this->assertEquals($value, $obj->getDocumentation());
  }

}

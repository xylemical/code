<?php

namespace Xylemical\Code;

use PHPUnit\Framework\TestCase;

class NameTraitTest extends TestCase {

  public function testName() {
    $obj = $this->getObjectForTrait(NameTrait::class);

    $this->assertEquals('undefined', $obj->getName());

    $name = 'Testing\\Framework';
    $obj->setName($name);
    $this->assertEquals($name, $obj->getName());
  }

}

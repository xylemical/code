<?php

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;

class StaticTraitTest extends TestCase {

  public function testStaticTrait() {
    $obj = $this->getObjectForTrait(StaticTrait::class);

    $this->assertFalse($obj->isStatic());

    $obj->setStatic(TRUE);
    $this->assertTrue($obj->isStatic());

    $obj->setStatic(FALSE);
    $this->assertFalse($obj->isStatic());
  }

}

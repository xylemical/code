<?php

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;

class AbstractTraitTest extends TestCase {

  public function testAbstractTrait() {
    $obj = $this->getObjectForTrait(AbstractTrait::class);

    $this->assertFalse($obj->isAbstract());

    $obj->setAbstract(TRUE);
    $this->assertTrue($obj->isAbstract());

    $obj->setAbstract(FALSE);
    $this->assertFalse($obj->isAbstract());
  }

}

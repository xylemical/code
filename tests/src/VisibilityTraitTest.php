<?php

namespace Xylemical\Code;

use PHPUnit\Framework\TestCase;

class VisibilityTraitTest extends TestCase {

  public function testVisibility() {
    $obj = $this->getObjectForTrait(VisibilityTrait::class);

    $this->assertEquals(Visibility::class, get_class($obj->getVisibility()));
    $this->assertEquals(Visibility::PUBLIC, $obj->getVisibility()
      ->getVisibility());

    $obj->setVisibility(-1);
    $this->assertEquals(Visibility::PUBLIC, $obj->getVisibility()
      ->getVisibility());

    $obj->setVisibility(Visibility::PROTECTED);
    $this->assertEquals(Visibility::PROTECTED, $obj->getVisibility()
      ->getVisibility());

    $obj->setVisibility(Visibility::PRIVATE);
    $this->assertEquals(Visibility::PRIVATE, $obj->getVisibility()
      ->getVisibility());
  }

}

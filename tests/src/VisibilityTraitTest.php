<?php

declare(strict_types=1);

namespace Xylemical\Code;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Code\VisibilityTrait.
 */
class VisibilityTraitTest extends TestCase {

  /**
   * Test sanity.
   */
  public function testVisibility(): void {
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

<?php

declare(strict_types=1);

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Code\Definition\StaticTrait.
 */
class StaticTraitTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testStaticTrait(): void {
    $obj = $this->getObjectForTrait(StaticTrait::class);

    $this->assertFalse($obj->isStatic());

    $obj->setStatic(TRUE);
    $this->assertTrue($obj->isStatic());

    $obj->setStatic(FALSE);
    $this->assertFalse($obj->isStatic());
  }

}

<?php

declare(strict_types=1);

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Code\Definition\AbstractTrait.
 */
class AbstractTraitTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testAbstractTrait(): void {
    $obj = $this->getObjectForTrait(AbstractTrait::class);

    $this->assertFalse($obj->isAbstract());

    $obj->setAbstract(TRUE);
    $this->assertTrue($obj->isAbstract());

    $obj->setAbstract(FALSE);
    $this->assertFalse($obj->isAbstract());
  }

}

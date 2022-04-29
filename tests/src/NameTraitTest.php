<?php

declare(strict_types=1);

namespace Xylemical\Code;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Code\NameTrait.
 */
class NameTraitTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testName(): void {
    $obj = $this->getObjectForTrait(NameTrait::class);

    $this->assertEquals('undefined', $obj->getName());

    $name = 'Testing\\Framework';
    $obj->setName($name);
    $this->assertEquals($name, $obj->getName());
  }

}

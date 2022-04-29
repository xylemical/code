<?php

declare(strict_types=1);

namespace Xylemical\Code;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Code\FullyQualifiedNameTrait.
 */
class FullyQualifiedNameTraitTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testFullyQualifiedName(): void {
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

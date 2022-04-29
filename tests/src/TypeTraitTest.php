<?php

declare(strict_types=1);

namespace Xylemical\Code;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Code\TypeTrait.
 */
class TypeTraitTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testType(): void {
    $obj = $this->getObjectForTrait(TypeTrait::class);

    $this->assertEquals(FullyQualifiedName::class, get_class($obj->getType()));
    $this->assertEquals('', (string) $obj->getType());
    $this->assertFalse($obj->hasType());

    $name = '\\Test\\Object';
    $name = new FullyQualifiedName($name);

    $obj->setType($name);
    $this->assertEquals((string) $name, (string) $obj->getType());
    $this->assertEquals($name, $obj->getType());
    $this->assertTrue($obj->hasType());
  }

}

<?php

declare(strict_types=1);

namespace Xylemical\Code;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Code\DocumentationTrait.
 */
class DocumentationTraitTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testDocumentation(): void {
    $obj = $this->getObjectForTrait(DocumentationTrait::class);

    $this->assertEquals(Documentation::class, get_class($obj->getDocumentation()));

    $value = $this->getMockBuilder(DocumentationInterface::class)
      ->getMock();

    $obj->setDocumentation($value);
    $this->assertEquals($value, $obj->getDocumentation());
  }

}

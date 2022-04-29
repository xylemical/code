<?php

declare(strict_types=1);

namespace Xylemical\Code;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Code\Documentation.
 */
class DocumentationTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testDocumentation(): void {
    $doc = new Documentation();
    $this->assertEquals('', $doc->getContents());
    $this->assertTrue($doc->isEmpty());

    $string = 'test string';
    $doc = new Documentation($string);
    $this->assertEquals($string, $doc->getContents());
    $this->assertFalse($doc->isEmpty());
  }

}

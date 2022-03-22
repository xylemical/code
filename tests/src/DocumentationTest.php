<?php

namespace Xylemical\Code;

use PHPUnit\Framework\TestCase;

class DocumentationTest extends TestCase {

  public function testDocumentation() {
    $doc = new Documentation();
    $this->assertEquals('', $doc->getContents());
    $this->assertTrue($doc->isEmpty());

    $string = 'test string';
    $doc = new Documentation($string);
    $this->assertEquals($string, $doc->getContents());
    $this->assertFalse($doc->isEmpty());
  }

}

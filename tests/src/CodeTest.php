<?php

namespace Xylemical\Code;

use PHPUnit\Framework\TestCase;

class CodeTest extends TestCase {

  public function testCode() {
    $obj = new Code('python', 'contents');
    $this->assertEquals('python', $obj->getLanguage());
    $this->assertEquals('contents', $obj->getContents());

    $obj->setLanguage('php')
      ->setContents('error');
    $this->assertEquals('php', $obj->getLanguage());
    $this->assertEquals('error', $obj->getContents());
  }

}

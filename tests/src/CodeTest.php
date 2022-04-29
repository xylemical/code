<?php

declare(strict_types=1);

namespace Xylemical\Code;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Code\Code.
 */
class CodeTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testCode(): void {
    $obj = new Code('python', 'contents');
    $this->assertEquals('python', $obj->getLanguage());
    $this->assertEquals('contents', $obj->getContents());

    $obj->setLanguage('php')
      ->setContents('error');
    $this->assertEquals('php', $obj->getLanguage());
    $this->assertEquals('error', $obj->getContents());
  }

}

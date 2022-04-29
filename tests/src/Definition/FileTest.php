<?php

declare(strict_types=1);

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Code\Definition\File.
 */
class FileTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testFile(): void {
    $a = File::create('dummy');
    $b = File::create('dummy');
    $c = File::create('test');

    $this->assertEquals($a, $b);
    $this->assertNotEquals($a, $c);
    $this->assertEquals('dummy', $a->getFilename());
    $this->assertTrue($a->isPrimary());

    $a->setFilename('test');
    $this->assertEquals('test', $a->getFilename());

    $a->setPrimary(FALSE);
    $this->assertFalse($a->isPrimary());
  }

}

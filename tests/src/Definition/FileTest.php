<?php

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;

class FileTest extends TestCase {

  public function testFile() {
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

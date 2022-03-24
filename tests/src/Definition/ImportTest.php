<?php

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;

class ImportTest extends TestCase {

  public function testImport() {
    $a = Import::create('dummy');
    $b = Import::create('dummy');
    $c = Import::create('test');

    $this->assertEquals($a, $b);
    $this->assertEquals($a->getName(), $b->getName());
    $this->assertNotEquals($a, $c);
    $this->assertNotEquals($a->getName(), $c->getName());
  }

}

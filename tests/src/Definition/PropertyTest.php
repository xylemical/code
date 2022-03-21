<?php

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;

class PropertyTest extends TestCase {

  public function testProperty() {
    $a = Property::create('dummy');
    $b = Property::create('dummy');
    $c = Property::create('test');

    $this->assertEquals($a, $b);
    $this->assertNotEquals($a, $c);
  }

}

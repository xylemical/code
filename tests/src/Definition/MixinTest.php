<?php

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;

class MixinTest extends TestCase {

  public function testMixin() {
    $a = Mixin::create('dummy');
    $b = Mixin::create('dummy');
    $c = Mixin::create('test');

    $this->assertEquals($a, $b);
    $this->assertNotEquals($a, $c);
  }

}

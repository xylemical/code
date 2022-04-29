<?php

declare(strict_types=1);

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Code\Definition\Mixin.
 */
class MixinTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testMixin(): void {
    $a = Mixin::create('dummy');
    $b = Mixin::create('dummy');
    $c = Mixin::create('test');

    $this->assertEquals($a, $b);
    $this->assertNotEquals($a, $c);
  }

}

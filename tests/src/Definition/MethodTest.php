<?php

declare(strict_types=1);

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Code\Definition\Method.
 */
class MethodTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testMethod(): void {
    $a = Method::create('dummy');
    $b = Method::create('dummy');
    $c = Method::create('test');

    $this->assertEquals($a, $b);
    $this->assertNotEquals($a, $c);
  }

}

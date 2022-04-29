<?php

declare(strict_types=1);

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Code\Definition\Parameter.
 */
class ParameterTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testParameter(): void {
    $a = Parameter::create('dummy');
    $b = Parameter::create('dummy');
    $c = Parameter::create('test');

    $this->assertEquals($a, $b);
    $this->assertNotEquals($a, $c);
  }

}

<?php

declare(strict_types=1);

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Code\Definition\Property.
 */
class PropertyTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testProperty(): void {
    $a = Property::create('dummy');
    $b = Property::create('dummy');
    $c = Property::create('test');

    $this->assertEquals($a, $b);
    $this->assertNotEquals($a, $c);
  }

}

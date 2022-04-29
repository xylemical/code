<?php

declare(strict_types=1);

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;
use Xylemical\Code\Expression;

/**
 * Tests \Xylemical\Code\Definition\Constant.
 */
class ConstantTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testConstant(): void {
    $a = Constant::create('dummy', new Expression());
    $b = Constant::create('dummy', new Expression());
    $c = Constant::create('test', new Expression());

    $this->assertEquals($a, $b);
    $this->assertNotEquals($a, $c);
  }

}

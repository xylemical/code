<?php

declare(strict_types=1);

namespace Xylemical\Code;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Code\Expression.
 */
class ExpressionTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testExpression(): void {
    $contents = 'test contents';
    $obj = new Expression($contents);
    $this->assertEquals($contents, $obj->getCode()->getContents());
    $this->assertEquals('php', $obj->getCode()->getLanguage());
    $this->assertFalse($obj->isEmpty());

    $obj = new Expression();
    $this->assertEquals('', $obj->getCode()->getContents());
    $this->assertNotEquals($contents, $obj->getCode()->getContents());
    $this->assertTrue($obj->isEmpty());

    $obj = Expression::create($contents);
    $this->assertEquals($contents, (string) $obj->getCode());
  }

}

<?php

declare(strict_types=1);

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Code\Definition\Import.
 */
class ImportTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testImport(): void {
    $a = Import::create('dummy');
    $b = Import::create('dummy');
    $c = Import::create('test');

    $this->assertEquals($a, $b);
    $this->assertEquals($a->getName(), $b->getName());
    $this->assertNotEquals($a, $c);
    $this->assertNotEquals($a->getName(), $c->getName());
  }

}

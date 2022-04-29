<?php

declare(strict_types=1);

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Code\Definition\Structure.
 */
class StructureTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testStructure(): void {
    $a = Structure::create('dummy');
    $b = Structure::create('dummy');
    $c = Structure::create('test');

    $this->assertEquals($a, $b);
    $this->assertNotEquals($a, $c);

    $this->assertFalse($a->isFinal());

    $a->setFinal(TRUE);
    $this->assertTrue($a->isFinal());

    $a->setFinal(FALSE);
    $this->assertFalse($a->isFinal());

    $this->assertNull($a->getParent());
    $this->assertFalse($a->hasParent());

    $a->setParent($c);
    $this->assertTrue($a->hasParent());
    $this->assertEquals($c, $a->getParent());

    $a->removeParent();
    $this->assertFalse($a->hasParent());
    $this->assertNull($a->getParent());
  }

}

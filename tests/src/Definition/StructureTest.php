<?php

declare(strict_types=1);

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;
use Xylemical\Code\Language;
use Xylemical\Code\NameManager;

/**
 * Tests \Xylemical\Code\Definition\Structure.
 */
class StructureTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testStructure(): void {
    $manager = new NameManager(new Language());
    /** @var \Xylemical\Code\Definition\Structure $a */
    $a = Structure::create('test\\foo', $manager);

    $this->assertFalse($a->isFinal());
    $this->assertFalse($a->isAbstract());

    $a->setFinal(TRUE);
    $this->assertTrue($a->isFinal());

    $a->setFinal(FALSE);
    $this->assertFalse($a->isFinal());

    $a->setAbstract(TRUE);
    $this->assertTrue($a->isAbstract());

    $a->setAbstract(FALSE);
    $this->assertFalse($a->isAbstract());

    $this->assertNull($a->getParent());
    $this->assertFalse($a->hasParent());

    $a->setParent('test\\faz');
    $this->assertTrue($a->hasParent());
    $this->assertEquals('test\\faz', (string) $a->getParent());

    $a->setParent('');
    $this->assertFalse($a->hasParent());
    $this->assertNull($a->getParent());
  }

}

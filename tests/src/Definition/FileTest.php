<?php

declare(strict_types=1);

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;
use Xylemical\Code\Language;

/**
 * Tests \Xylemical\Code\Definition\File.
 */
class FileTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testFile(): void {
    $language = new Language();

    $a = File::create('dummy', $language);
    $b = File::create('dummy', $language);
    $c = File::create('test', $language);

    $this->assertNotSame($a, $b);
    $this->assertNotSame($a, $c);
    $this->assertEquals('dummy', $a->getFilename());
    $this->assertTrue($a->isPrimary());
    $this->assertEquals([], $a->getStructures());

    $this->assertSame($language, $a->getLanguage());
    $this->assertSame($language, $a->getNameManager()->getLanguage());

    $a->setFilename('test');
    $this->assertEquals('test', $a->getFilename());

    $a->setPrimary(FALSE);
    $this->assertFalse($a->isPrimary());

    $structure = new Structure('test', $a->getNameManager());
    $a->setStructures([$structure]);
    $this->assertEquals([$structure], $a->getStructures());
    $this->assertSame($structure, $a->getStructure('test'));
    $this->assertTrue($a->hasStructure('test'));
    $this->assertFalse($a->hasStructure('bar'));
    $a->removeStructure('test');
    $this->assertFalse($a->hasStructure('test'));

    $a->addStructure($structure);

    $structure = new Structure('foo', $a->getNameManager());
    $a->addStructure($structure);
    $this->assertTrue($a->hasStructure('foo'));

    $structure = new Structure('test\\foo', $a->getNameManager());
    $a->addStructure($structure);
    $this->assertFalse($a->hasStructure('test\\foo'));
  }

}

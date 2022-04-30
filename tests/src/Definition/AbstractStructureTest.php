<?php

declare(strict_types=1);

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;
use Xylemical\Code\DocumentationInterface;
use Xylemical\Code\FullyQualifiedName;
use Xylemical\Code\Language;
use Xylemical\Code\NameManager;

/**
 * Tests \Xylemical\Code\Definition\AbstractStructure.
 */
class AbstractStructureTest extends TestCase {

  use ProphecyTrait;

  /**
   * Test sanity.
   */
  public function testSanity(): void {
    $manager = new NameManager(new Language());

    /** @var \Xylemical\Code\Definition\AbstractStructure $structure */
    $structure = $this->getMockForAbstractClass(
      AbstractStructure::class,
      ['test\\foo', $manager]
    );
    $this->assertEquals('test\\foo', (string) $structure);
    $this->assertEquals('test\\foo', $structure->getName());
    $this->assertEquals(['test'], $structure->getFullyQualifiedName()
      ->getNamespace());
    $this->assertTrue($structure->getDocumentation()->isEmpty());
    $this->assertEquals([], $structure->getElements());
    $this->assertEquals([], $structure->getContracts());
    $this->assertEquals([], $structure->getMixins());
    $this->assertNull($structure->getParent());
    $this->assertFalse($structure->hasParent());

    $structure->setName('foo\\bar');
    $this->assertEquals('foo\\bar', (string) $structure);
    $this->assertEquals(['foo'], $structure->getFullyQualifiedName()
      ->getNamespace());

    $fqname = new FullyQualifiedName('foo\\bar', $manager);
    $structure->setFullyQualifiedName($fqname);
    $this->assertEquals('foo\\bar', (string) $structure);
    $this->assertNotSame($fqname, $structure->getFullyQualifiedName());

    $doc = $this->getMockBuilder(DocumentationInterface::class)->getMock();
    $structure->setDocumentation($doc);
    $this->assertSame($doc, $structure->getDocumentation());

    // Structure by default should not allow parents.
    $structure->setParent('test\\bar');
    $this->assertNull($structure->getParent());
    $this->assertFalse($structure->hasParent());

    $element = $this->prophesize(ElementInterface::class);
    $element->getName()->willReturn('test');
    $element = $element->reveal();

    $structure->setElements([$element]);
    $this->assertSame($element, $structure->getElement('test'));
    $this->assertNull($structure->getElement('bar'));
    $this->assertTrue($structure->hasElement('test'));
    $this->assertFalse($structure->hasElement('bar'));
    $this->assertEquals([$element], $structure->getElements());
    $structure->removeElement('test');
    $this->assertFalse($structure->hasElement('bar'));

    $structure->setContracts(['test\\faz']);
    $this->assertTrue($structure->hasContract('test\\faz'));
    $this->assertFalse($structure->hasContract('bar'));
    $this->assertEquals(['test\\faz'], $structure->getContracts());
    $structure->removeContract('test\\faz');
    $this->assertFalse($structure->hasContract('test\\faz'));

    $structure->setMixins(['test\\faz']);
    $this->assertTrue($structure->hasMixin('test\\faz'));
    $this->assertFalse($structure->hasMixin('bar'));
    $this->assertEquals(['test\\faz'], $structure->getMixins());
    $structure->removeMixin('test\\faz');
    $this->assertFalse($structure->hasMixin('test\\faz'));

  }

}

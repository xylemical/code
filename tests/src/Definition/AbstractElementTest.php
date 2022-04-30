<?php

declare(strict_types=1);

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;
use Xylemical\Code\DocumentationInterface;
use Xylemical\Code\ExpressionInterface;
use Xylemical\Code\Language;
use Xylemical\Code\NameManager;
use Xylemical\Code\Visibility;

/**
 * Tests \Xylemical\Code\Definition\AbstractElement.
 */
class AbstractElementTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testSanity(): void {
    $manager = new NameManager(new Language());

    /** @var \Xylemical\Code\Definition\AbstractElement $element */
    $element = $this->getMockForAbstractClass(AbstractElement::class, [
      'test',
      $manager,
    ]);
    $this->assertEquals('test', $element->getName());
    $this->assertTrue($element->getDocumentation()->isEmpty());
    $this->assertTrue($element->getVisibility()->isVisible(Visibility::PUBLIC));
    $this->assertFalse($element->isFinal());
    $this->assertFalse($element->isAbstract());
    $this->assertFalse($element->isStatic());
    $this->assertNull($element->getType());
    $this->assertNull($element->getValue());
    $this->assertEquals('test', (string) $element);

    $element
      ->setName('bar')
      ->setAbstract(TRUE)
      ->setStatic(TRUE)
      ->setFinal(TRUE);
    $this->assertEquals('bar', $element->getName());
    $this->assertTrue($element->isAbstract());
    $this->assertTrue($element->isStatic());
    $this->assertTrue($element->isFinal());

    $value = $this->getMockBuilder(ExpressionInterface::class)->getMock();
    $element->setValue($value);
    $this->assertSame($value, $element->getValue());

    $element->setType('Example\\Type');
    $this->assertEquals('Example\\Type', (string) $element->getType());

    $element->setVisibility(Visibility::PROTECTED);
    $this->assertEquals(Visibility::PROTECTED, $element->getVisibility()
      ->getVisibility());

    $element->setVisibility(Visibility::PRIVATE);
    $this->assertEquals(Visibility::PRIVATE, $element->getVisibility()
      ->getVisibility());

    $element->setVisibility(Visibility::PUBLIC);
    $this->assertEquals(Visibility::PUBLIC, $element->getVisibility()
      ->getVisibility());

    $documentation = $this->getMockBuilder(DocumentationInterface::class)
      ->getMock();
    $element->setDocumentation($documentation);
    $this->assertSame($documentation, $element->getDocumentation());

  }

}

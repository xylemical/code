<?php

declare(strict_types=1);

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;
use Xylemical\Code\DocumentationInterface;
use Xylemical\Code\ExpressionInterface;
use Xylemical\Code\Language;
use Xylemical\Code\NameManager;

/**
 * Tests \Xylemical\Code\Definition\Parameter.
 */
class ParameterTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testParameter(): void {
    $manager = new NameManager(new Language());

    $parameter = Parameter::create('test', $manager);
    $this->assertEquals('test', $parameter->getName());
    $this->assertTrue($parameter->getDocumentation()->isEmpty());
    $this->assertNull($parameter->getType());
    $this->assertNull($parameter->getValue());
    $this->assertEquals('test', (string) $parameter);

    $parameter->setName('bar');
    $this->assertEquals('bar', $parameter->getName());

    $value = $this->getMockBuilder(ExpressionInterface::class)->getMock();
    $parameter->setValue($value);
    $this->assertSame($value, $parameter->getValue());

    $parameter->setType('Example\\Type');
    $this->assertEquals('Example\\Type', (string) $parameter->getType());

    $documentation = $this->getMockBuilder(DocumentationInterface::class)->getMock();
    $parameter->setDocumentation($documentation);
    $this->assertSame($documentation, $parameter->getDocumentation());
  }

}

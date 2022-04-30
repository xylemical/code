<?php

declare(strict_types=1);

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;
use Xylemical\Code\Language;
use Xylemical\Code\NameManager;

/**
 * Tests \Xylemical\Code\Definition\Method.
 */
class MethodTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testMethod(): void {
    $manager = new NameManager(new Language());

    /** @var \Xylemical\Code\Definition\Method $a */
    $a = Method::create('dummy', $manager);
    $b = Method::create('dummy', $manager);
    $c = Method::create('test', $manager);

    $this->assertEquals($a, $b);
    $this->assertNotEquals($a, $c);

    $this->assertEquals([], $a->getParameters());
    $this->assertFalse($a->hasParameter('test'));

    $parameter = new Parameter('test', $manager);
    $a->setParameters([$parameter]);
    $this->assertEquals([$parameter], $a->getParameters());
    $this->assertSame($parameter, $a->getParameter('test'));
    $this->assertTrue($a->hasParameter('test'));
    $this->assertFalse($a->hasParameter('bar'));
    $a->removeParameter('test');
    $this->assertFalse($a->hasParameter('test'));
  }

}

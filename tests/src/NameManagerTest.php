<?php

declare(strict_types=1);

namespace Xylemical\Code;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Code\NameManager.
 */
class NameManagerTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testSanity(): void {
    $language = new Language('c++', '::');
    $manager = new NameManager($language);
    $this->assertSame($language, $manager->getLanguage());

    $name = $manager->get('test\\foo');
    $this->assertEquals('test\\foo', $name->getName());
    $this->assertEquals([], $name->getNamespace());

    $second = $manager->get('test\\foo');
    $this->assertSame($name, $second);

    $name = $manager->get('test::foo');
    $this->assertEquals('foo', $name->getName());
    $this->assertEquals(['test'], $name->getNamespace());

    $second = $manager->getName($name);
    $this->assertSame($second, $name);

    $second = $manager->getName(new FullyQualifiedName('test::foo', $manager));
    $this->assertSame($second, $name);

    $this->assertEquals([
      'test\\foo',
      'test::foo',
    ], array_map('strval', $manager->all()));
  }

}

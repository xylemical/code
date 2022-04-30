<?php

declare(strict_types=1);

namespace Xylemical\Code;

use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

/**
 * Tests \Xylemical\Code\FullyQualifiedName.
 */
class FullyQualifiedNameTest extends TestCase {

  use ProphecyTrait;

  /**
   * Provides test data for testFullyQualifiedName().
   *
   * @return array
   *   The test data.
   */
  public function providerTestFullyQualifiedName(): array {
    return [
      ['unknown', 'unknown', 'unknown', ''],
      ['\\unknown', 'unknown', 'unknown', ''],
      ['unknown\\test', 'unknown\\test', 'test', 'unknown'],
      ['\\unknown\\test', 'unknown\\test', 'test', 'unknown'],
      ['$unknown$test', 'unknown$test', 'test', 'unknown', '$'],
    ];
  }

  /**
   * Tests sanity.
   *
   * @dataProvider providerTestFullyQualifiedName
   */
  public function testFullyQualifiedName(string $name, string $fullname, string $shortname, string $namespace, ?string $separator = NULL): void {
    $manager = new NameManager(new Language());
    if ($separator) {
      $manager->getLanguage()->setSeparator($separator);
    }

    $separator = $separator ?: '\\';

    $obj = new FullyQualifiedName($name, $manager);
    $this->assertEquals($fullname, (string) $obj);
    $this->assertEquals($shortname, $obj->getName());
    $this->assertEquals($shortname, $obj->getShorthand());
    $this->assertEquals($namespace, $obj->getNamespace());
    $this->assertEquals($fullname, $obj->getFullName());
    $this->assertFalse($obj->hasShorthand());
    $this->assertTrue($obj->equals(new FullyQualifiedName($fullname, $manager)));
    $this->assertFalse($obj->equals(new FullyQualifiedName('different', $manager)));
    $this->assertFalse($obj->equals(new FullyQualifiedName("different{$separator}namespace", $manager)));
    $this->assertEquals($separator, $obj->getSeparator());

    $obj->setShorthand('alias');
    $this->assertEquals($shortname, $obj->getName());
    $this->assertEquals('alias', $obj->getShorthand());
    $this->assertTrue($obj->hasShorthand());
    $this->assertTrue($obj->equals(new FullyQualifiedName($fullname, $manager)));
    $this->assertFalse($obj->equals(new FullyQualifiedName('alias', $manager)));
  }

  /**
   * Tests creation.
   */
  public function testCreation(): void {
    $manager = new NameManager(new Language());

    $obj = FullyQualifiedName::create('unknown\\test', $manager);
    $this->assertEquals('unknown', $obj->getNamespace());
    $this->assertEquals('test', $obj->getName());
    $this->assertEquals('unknown\\test', (string) $obj);
  }

}

<?php

declare(strict_types=1);

namespace Xylemical\Code;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Code\FullyQualifiedName.
 */
class FullyQualifiedNameTest extends TestCase {

  /**
   * Provides test data for testFullyQualifiedName().
   *
   * @return array
   *   The test data.
   */
  public function providerTestFullyQualifiedName(): array {
    return [
      ['unknown', 'unknown', 'unknown', []],
      ['\\unknown', 'unknown', 'unknown', []],
      ['unknown\\test', 'unknown\\test', 'test', ['unknown']],
      ['\\unknown\\test', 'unknown\\test', 'test', ['unknown']],
      ['$unknown$test', 'unknown$test', 'test', ['unknown'], '$'],
    ];
  }

  /**
   * Tests sanity.
   *
   * @dataProvider providerTestFullyQualifiedName
   */
  public function testFullyQualifiedName(string $name, string $fullname, string $shortname, array $namespaces, ?string $separator = NULL): void {
    if ($separator) {
      FullyQualifiedName::setSeparator($separator);
      $this->assertEquals($separator, FullyQualifiedName::getSeparator());
    }
    else {
      $separator = '\\';
    }

    $obj = new FullyQualifiedName($name);
    $this->assertEquals($fullname, (string) $obj);
    $this->assertEquals($shortname, $obj->getName());
    $this->assertEquals($shortname, $obj->getShorthand());
    $this->assertEquals($namespaces, $obj->getNamespace());
    $this->assertEquals(explode($separator, $fullname), $obj->getFullName());
    $this->assertFalse($obj->hasShorthand());
    $this->assertTrue($obj->equals(new FullyQualifiedName($fullname)));
    $this->assertFalse($obj->equals(new FullyQualifiedName('different')));
    $this->assertFalse($obj->equals(new FullyQualifiedName("different{$separator}namespace")));

    $obj->setShorthand('alias');
    $this->assertEquals($shortname, $obj->getName());
    $this->assertEquals('alias', $obj->getShorthand());
    $this->assertTrue($obj->hasShorthand());
    $this->assertTrue($obj->equals(new FullyQualifiedName($fullname)));
    $this->assertFalse($obj->equals(new FullyQualifiedName('alias')));
  }

  /**
   * Tests creation.
   */
  public function testCreation(): void {
    $obj = FullyQualifiedName::create('unknown');
    $this->assertEquals($obj, FullyQualifiedName::create('unknown'));
  }

}

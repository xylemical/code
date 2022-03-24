<?php

namespace Xylemical\Code;

use PHPUnit\Framework\TestCase;

class FullyQualifiedNameTest extends TestCase {

  public function providerTestFullyQualifiedName() {
    return [
      ['unknown', 'unknown', 'unknown', []],
      ['\\unknown', 'unknown', 'unknown', []],
      ['unknown\\test', 'unknown\\test', 'test', ['unknown']],
      ['\\unknown\\test', 'unknown\\test', 'test', ['unknown']],
      ['$unknown$test', 'unknown$test', 'test', ['unknown'], '$'],
    ];
  }

  /**
   * @dataProvider providerTestFullyQualifiedName
   */
  public function testFullyQualifiedName($name, $fullname, $shortname, $namespaces, $separator = NULL) {
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

  public function testCreation() {
    $obj = FullyQualifiedName::create('unknown');
    $this->assertEquals($obj, FullyQualifiedName::create('unknown'));
  }

}

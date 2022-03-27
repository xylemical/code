<?php

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;
use Xylemical\Code\FullyQualifiedName;

class ImportTraitTest extends TestCase {

  public function testImport() {
    $obj = $this->getObjectForTrait(ImportTrait::class);

    $this->assertNull($obj->getImport('test'));
    $this->assertFalse($obj->hasImports());

    $a = new Import(FullyQualifiedName::create('Test\\Trait'));
    $b = new Import(FullyQualifiedName::create('Test\\Sequence'));

    $obj->setImports([$a, $b]);

    $this->assertNull($obj->getImport('test'));
    $this->assertEquals($a, $obj->getImport('Test\\Trait'));
    $this->assertEquals($b, $obj->getImport('Test\\Sequence'));
    $this->assertTrue($obj->hasImports());

    $c = new Import(FullyQualifiedName::create('Test'));
    $obj->addImports([$c]);
    $this->assertEquals($c, $obj->getImport('Test'));
    $this->assertEquals($c, $obj->getImport('test'));
    $this->assertEquals($a, $obj->getImport('Test\\Trait'));
    $this->assertEquals([$a, $b, $c], $obj->getImports());

    $obj->removeImport('Test\\Sequence');
    $this->assertNull($obj->getImport('Test\\Sequence'));

    $obj->setImports([$c]);
    $this->assertEquals($c, $obj->getImport('Test'));
    $this->assertNull($obj->getImport('Test\\Trait'));

    $obj->removeImport('test');
    $this->assertNull($obj->getImport('Test'));
  }

}

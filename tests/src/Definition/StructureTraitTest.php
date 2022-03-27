<?php

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;

class StructureTraitTest extends TestCase {

  public function testStructure() {
    $obj = $this->getObjectForTrait(StructureTrait::class);

    $this->assertNull($obj->getStructure('test'));
    $this->assertFalse($obj->hasStructures());

    $a = new Structure('Test\\Trait');
    $b = new Structure('Test\\Sequence');

    $obj->setStructures([$a, $b]);

    $this->assertNull($obj->getStructure('test'));
    $this->assertEquals($a, $obj->getStructure('Test\\Trait'));
    $this->assertEquals($b, $obj->getStructure('Test\\Sequence'));
    $this->assertTrue($obj->hasStructures());

    $c = new Structure('Test');
    $obj->addStructures([$c]);
    $this->assertEquals($c, $obj->getStructure('Test'));
    $this->assertEquals($c, $obj->getStructure('test'));
    $this->assertEquals($a, $obj->getStructure('Test\\Trait'));
    $this->assertEquals([$a, $b, $c], $obj->getStructures());

    $obj->removeStructure('Test\\Sequence');
    $this->assertNull($obj->getStructure('Test\\Sequence'));

    $obj->setStructures([$c]);
    $this->assertEquals($c, $obj->getStructure('Test'));
    $this->assertNull($obj->getStructure('Test\\Trait'));

    $obj->removeStructure('test');
    $this->assertNull($obj->getStructure('Test'));
  }

}

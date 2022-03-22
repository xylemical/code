<?php

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;

class ContractTraitTest extends TestCase {

  public function testContract() {
    $obj = $this->getObjectForTrait(ContractTrait::class);

    $this->assertNull($obj->getContract('test'));

    $a = new Contract('Test\\Trait');
    $b = new Contract('Test\\Sequence');

    $obj->setContracts([$a, $b]);

    $this->assertNull($obj->getContract('test'));
    $this->assertEquals($a, $obj->getContract('Test\\Trait'));
    $this->assertEquals($b, $obj->getContract('Test\\Sequence'));

    $c = new Contract('Test');
    $obj->addContracts([$c]);
    $this->assertEquals($c, $obj->getContract('Test'));
    $this->assertEquals($c, $obj->getContract('test'));
    $this->assertEquals($a, $obj->getContract('Test\\Trait'));
    $this->assertEquals([$a, $b, $c], $obj->getContracts());

    $obj->removeContract('Test\\Sequence');
    $this->assertNull($obj->getContract('Test\\Sequence'));

    $obj->setContracts([$c]);
    $this->assertEquals($c, $obj->getContract('Test'));
    $this->assertNull($obj->getContract('Test\\Trait'));

    $obj->removeContract('test');
    $this->assertNull($obj->getContract('Test'));
  }

}

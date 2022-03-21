<?php

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;

class ContractTest extends TestCase {

  public function testContract() {
    $a = Contract::create('dummy');
    $b = Contract::create('dummy');
    $c = Contract::create('test');

    $this->assertEquals($a, $b);
    $this->assertNotEquals($a, $c);
  }

}

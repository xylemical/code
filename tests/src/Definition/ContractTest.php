<?php

declare(strict_types=1);

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Code\Definition\Contract.
 */
class ContractTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testContract(): void {
    $a = Contract::create('dummy');
    $b = Contract::create('dummy');
    $c = Contract::create('test');

    $this->assertEquals($a, $b);
    $this->assertNotEquals($a, $c);
  }

}

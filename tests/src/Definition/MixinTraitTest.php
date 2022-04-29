<?php

declare(strict_types=1);

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Code\Definition\MixinTrait.
 */
class MixinTraitTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testMixin(): void {
    $obj = $this->getObjectForTrait(MixinTrait::class);

    $this->assertNull($obj->getMixin('test'));
    $this->assertFalse($obj->hasMixins());

    $a = new Mixin('Test\\Trait');
    $b = new Mixin('Test\\Sequence');

    $obj->setMixins([$a, $b]);

    $this->assertNull($obj->getMixin('test'));
    $this->assertEquals($a, $obj->getMixin('Test\\Trait'));
    $this->assertEquals($b, $obj->getMixin('Test\\Sequence'));
    $this->assertTrue($obj->hasMixins());

    $c = new Mixin('Test');
    $obj->addMixins([$c]);
    $this->assertEquals($c, $obj->getMixin('Test'));
    $this->assertEquals($c, $obj->getMixin('test'));
    $this->assertEquals($a, $obj->getMixin('Test\\Trait'));
    $this->assertEquals([$a, $b, $c], $obj->getMixins());

    $obj->removeMixin('Test\\Sequence');
    $this->assertNull($obj->getMixin('Test\\Sequence'));

    $obj->setMixins([$c]);
    $this->assertEquals($c, $obj->getMixin('Test'));
    $this->assertNull($obj->getMixin('Test\\Trait'));

    $obj->removeMixin('test');
    $this->assertNull($obj->getMixin('Test'));
  }

}

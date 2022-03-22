<?php

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;

class MixinTraitTest extends TestCase {

  public function testMixin() {
    $obj = $this->getObjectForTrait(MixinTrait::class);

    $this->assertNull($obj->getMixin('test'));

    $a = new Mixin('Test\\Trait');
    $b = new Mixin('Test\\Sequence');

    $obj->setMixins([$a, $b]);

    $this->assertNull($obj->getMixin('test'));
    $this->assertEquals($a, $obj->getMixin('Test\\Trait'));
    $this->assertEquals($b, $obj->getMixin('Test\\Sequence'));

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

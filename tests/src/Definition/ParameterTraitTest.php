<?php

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;

class ParameterTraitTest extends TestCase {

  public function testParameter() {
    $obj = $this->getObjectForTrait(ParameterTrait::class);

    $this->assertNull($obj->getParameter('test'));

    $a = new Parameter('Test\\Trait');
    $b = new Parameter('Test\\Sequence');

    $obj->setParameters([$a, $b]);

    $this->assertNull($obj->getParameter('test'));
    $this->assertEquals($a, $obj->getParameter('Test\\Trait'));
    $this->assertEquals($b, $obj->getParameter('Test\\Sequence'));

    $c = new Parameter('Test');
    $obj->addParameters([$c]);
    $this->assertEquals($c, $obj->getParameter('Test'));
    $this->assertEquals($c, $obj->getParameter('test'));
    $this->assertEquals($a, $obj->getParameter('Test\\Trait'));
    $this->assertEquals([$a, $b, $c], $obj->getParameters());

    $obj->removeParameter('Test\\Sequence');
    $this->assertNull($obj->getParameter('Test\\Sequence'));

    $obj->setParameters([$c]);
    $this->assertEquals($c, $obj->getParameter('Test'));
    $this->assertNull($obj->getParameter('Test\\Trait'));

    $obj->removeParameter('test');
    $this->assertNull($obj->getParameter('Test'));
  }

}

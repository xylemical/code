<?php

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;

class ProjectTraitTest extends TestCase {

  public function testProject() {
    $strategy = $this->getMockBuilder(FilenameStrategyInterface::class)
      ->getMock();

    $obj = $this->getObjectForTrait(ProjectTrait::class);

    $this->assertNull($obj->getProject('test'));
    $this->assertFalse($obj->hasProjects());

    $a = new Project('Test\\Trait', $strategy);
    $b = new Project('Test\\Sequence', $strategy);

    $obj->setProjects([$a, $b]);

    $this->assertNull($obj->getProject('test'));
    $this->assertEquals($a, $obj->getProject('Test\\Trait'));
    $this->assertEquals($b, $obj->getProject('Test\\Sequence'));
    $this->assertTrue($obj->hasProjects());

    $c = new Project('Test', $strategy);
    $obj->addProjects([$c]);
    $this->assertEquals($c, $obj->getProject('Test'));
    $this->assertEquals($c, $obj->getProject('test'));
    $this->assertEquals($a, $obj->getProject('Test\\Trait'));
    $this->assertEquals([$a, $b, $c], $obj->getProjects());

    $obj->removeProject('Test\\Sequence');
    $this->assertNull($obj->getProject('Test\\Sequence'));

    $obj->setProjects([$c]);
    $this->assertEquals($c, $obj->getProject('Test'));
    $this->assertNull($obj->getProject('Test\\Trait'));

    $obj->removeProject('test');
    $this->assertNull($obj->getProject('Test'));
  }

}

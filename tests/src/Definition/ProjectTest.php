<?php

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;
use Xylemical\Code\FullyQualifiedName;

class ProjectTest extends TestCase {

  use ProphecyTrait;

  public function testProject() {
    $strategy = $this->getMockBuilder(FilenameStrategyInterface::class)
      ->getMock();

    $a = Project::create('dummy', $strategy);
    $b = Project::create('dummy', $strategy);
    $c = Project::create('test', $strategy);

    $this->assertEquals($a, $b);
    $this->assertNotEquals($a, $c);

    $project = new Project('test', $strategy);

    $this->assertEquals('test', $project->getName());
    $this->assertEquals('', $project->getPath());
    $this->assertEquals($strategy, $project->getStrategy());

    $project->setPath(__DIR__);
    $this->assertEquals(__DIR__, $project->getPath());

    $strategy = $this->getMockBuilder(FilenameStrategyInterface::class)
      ->getMock();
    $project->setStrategy($strategy);
    $this->assertEquals($strategy, $project->getStrategy());
  }

  public function testStructure() {
    $strategy = $this->prophesize(FilenameStrategyInterface::class);
    $strategy
      ->getFilename(FullyQualifiedName::create('test'))
      ->willReturn('src/Test.php');
    $strategy
      ->getFilename(FullyQualifiedName::create('dummy'))
      ->willReturn('src/Test.php');

    $project = new Project('test', $strategy->reveal());

    $this->assertEquals([], iterator_to_array($project->getStructures()));
    $this->assertNull($project->getStructure('test'));
    $this->assertFalse($project->hasStructure('test'));
    $this->assertNull($project->getFile('src/Test.php'));

    $structure = new Structure('test');
    $project->addStructure($structure);
    $this->assertTrue($project->hasStructure('test'));
    $this->assertEquals($structure, $project->getStructure('test'));
    $this->assertNotNull($project->getFile('src/Test.php'));
    $this->assertEquals($project->getFile('src/Test.php'), $project->getFileByName('test'));
    $this->assertEquals([$structure], iterator_to_array($project->getStructures()));

    $dummy = new Structure('dummy');
    $project->addStructure($dummy);
    $this->assertEquals([
      $structure,
      $dummy,
    ], iterator_to_array($project->getStructures()));

    $project->removeStructure($dummy);
    $this->assertEquals([
      $structure,
    ], iterator_to_array($project->getStructures()));
  }

}

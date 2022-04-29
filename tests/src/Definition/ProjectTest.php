<?php

declare(strict_types=1);

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;
use Xylemical\Code\FullyQualifiedName;

/**
 * Tests \Xylemical\Code\Definition\Project.
 */
class ProjectTest extends TestCase {

  use ProphecyTrait;

  /**
   * Tests sanity.
   */
  public function testProject(): void {
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

  /**
   * Tests structure within a project.
   */
  public function testStructure(): void {
    $strategy = $this->prophesize(FilenameStrategyInterface::class);
    $strategy
      ->getFilenames(FullyQualifiedName::create('test'))
      ->willReturn(['src/Test.php']);
    $strategy
      ->getFilenames(FullyQualifiedName::create('dummy'))
      ->willReturn(['src/Test.php', 'src/Dummy.php']);

    $project = new Project('test', $strategy->reveal());

    $this->assertEquals([], $project->getStructures());
    $this->assertNull($project->getStructure('test'));
    $this->assertFalse($project->hasStructure('test'));
    $this->assertNull($project->getFile('src/Test.php'));

    $structure = new Structure('test');
    $project->addStructure($structure);
    $this->assertTrue($project->hasStructure('test'));
    $this->assertEquals($structure, $project->getStructure('test'));
    $this->assertNotNull($project->getFile('src/Test.php'));
    $this->assertEquals([$project->getFile('src/Test.php')], $project->getFilesByName('test'));
    $this->assertEquals([$structure], $project->getStructures());

    $dummy = new Structure('dummy');
    $project->addStructure($dummy);
    $this->assertEquals([
      $structure,
      $dummy,
    ], $project->getStructures());

    $this->assertNotNull($project->getFile('src/Dummy.php'));
    $this->assertEquals([
      $project->getFile('src/Test.php'),
      $project->getFile('src/Dummy.php'),
    ], $project->getFilesByName('dummy'));

    $project->removeStructure($dummy);
    $this->assertEquals([
      $structure,
    ], $project->getStructures());
  }

}

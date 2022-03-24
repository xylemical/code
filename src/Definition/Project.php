<?php

namespace Xylemical\Code\Definition;

use Xylemical\Code\FullyQualifiedName;
use Xylemical\Code\ObjectManager;

/**
 * Provides a project based behaviour.
 */
class Project {

  use FileTrait;
  use ProjectTrait;

  /**
   * The project name.
   *
   * @var string
   */
  protected string $name;

  /**
   * The project path.
   *
   * @var string
   */
  protected string $path = '';

  /**
   * The filename strategy for the project.
   *
   * @var \Xylemical\Code\Definition\FilenameStrategyInterface
   */
  protected FilenameStrategyInterface $strategy;

  /**
   * Project constructor.
   *
   * @param string $name
   *   The project name.
   * @param \Xylemical\Code\Definition\FilenameStrategyInterface $strategy
   *   The filename strategy.
   */
  public function __construct(string $name, FilenameStrategyInterface $strategy) {
    $this->name = $name;
    $this->strategy = $strategy;
  }

  /**
   * Get the project name.
   *
   * @return string
   *   The name.
   */
  public function getName(): string {
    return $this->name;
  }

  /**
   * Get the project path.
   *
   * @return string
   *   The project path.
   */
  public function getPath(): string {
    return $this->path;
  }

  /**
   * Set the path of the project.
   *
   * @param string $path
   *   The project path.
   *
   * @return $this
   */
  public function setPath(string $path): static {
    $this->path = $path;
    return $this;
  }

  /**
   * Get the filename strategy.
   *
   * @return \Xylemical\Code\Definition\FilenameStrategyInterface
   *   The filename strategy.
   */
  public function getStrategy(): FilenameStrategyInterface {
    return $this->strategy;
  }

  /**
   * Set the filename strategy.
   *
   * @param \Xylemical\Code\Definition\FilenameStrategyInterface $strategy
   *   The filename strategy.
   *
   * @return $this
   */
  public function setStrategy(FilenameStrategyInterface $strategy): static {
    $this->strategy = $strategy;
    return $this;
  }

  /**
   * Check the project contains the structure.
   *
   * @param string $name
   *   The structure name.
   *
   * @return bool
   *   The result.
   */
  public function hasStructure(string $name): bool {
    if ($this->getFileByName($name)) {
      return TRUE;
    }
    return FALSE;
  }

  /**
   * Get the structures of the project.
   *
   * @return \Generator
   *   The generator.
   */
  public function getStructures(): \Generator {
    foreach ($this->files as $file) {
      foreach ($file->getStructures() as $structure) {
        yield $structure;
      }
    }
  }

  /**
   * Get a project structure by name.
   *
   * @param string $name
   *   The structure name.
   *
   * @return \Xylemical\Code\Definition\StructureInterface|null
   *   The structure.
   */
  public function getStructure(string $name): ?StructureInterface {
    if ($file = $this->getFileByName($name)) {
      return $file->getStructure($name);
    }
    return NULL;
  }

  /**
   * Add a structure to the project.
   *
   * @param \Xylemical\Code\Definition\StructureInterface $structure
   *   The structure.
   *
   * @return $this
   */
  public function addStructure(StructureInterface $structure): static {
    $filename = $this->getStrategy()
      ->getFilename($structure->getFullyQualifiedName());

    if ($file = $this->getFile($filename)) {
      $file->addStructure($structure);
      return $this;
    }

    $file = File::create($filename);
    $file->addStructure($structure);
    $this->addFile($file);
    return $this;
  }

  /**
   * Remove the structure from the project.
   *
   * @param \Xylemical\Code\Definition\StructureInterface $structure
   *   The structure.
   *
   * @return $this
   */
  public function removeStructure(StructureInterface $structure): static {
    $filename = $this->getStrategy()
      ->getFilename($structure->getFullyQualifiedName());

    if ($file = $this->getFile($filename)) {
      $file->removeStructure($structure->getName());
    }
    return $this;
  }

  /**
   * Get file for a structure name.
   *
   * @param string $name
   *   The name.
   *
   * @return \Xylemical\Code\Definition\File|null
   *   The file.
   */
  public function getFileByName(string $name): ?File {
    $filename = $this->getStrategy()
      ->getFilename(FullyQualifiedName::create($name));

    return $this->getFile($filename);
  }

  /**
   * Create a Project.
   *
   * @param string $name
   *   The name.
   * @param \Xylemical\Code\Definition\FilenameStrategyInterface $strategy
   *   The filename strategy for the project.
   *
   * @return $this
   */
  public static function create(string $name, FilenameStrategyInterface $strategy): static {
    return ObjectManager::get(Project::class, strtolower($name), new Project($name, $strategy));
  }

}

<?php

declare(strict_types=1);

namespace Xylemical\Code\Definition;

use Xylemical\Code\DefinitionInterface;
use Xylemical\Code\Language;
use Xylemical\Code\LanguageInterface;
use Xylemical\Code\NameManager;

/**
 * Provides structure as part of the file.
 */
class File implements DefinitionInterface {

  /**
   * The filename.
   *
   * @var string
   */
  protected string $filename;

  /**
   * This is a primary file for the structures.
   *
   * @var bool
   */
  protected bool $primary = TRUE;

  /**
   * The name manager for the file.
   *
   * @var \Xylemical\Code\NameManager
   */
  protected NameManager $manager;

  /**
   * The structures.
   *
   * @var \Xylemical\Code\Definition\StructureInterface[]
   */
  protected array $structures = [];

  /**
   * File constructor.
   *
   * @param string $filename
   *   The filename.
   * @param \Xylemical\Code\LanguageInterface|null $language
   *   The language.
   */
  public function __construct(string $filename, ?LanguageInterface $language = NULL) {
    $this->filename = $filename;
    $this->manager = new NameManager($language ?: new Language());
  }

  /**
   * Get the language.
   *
   * @return \Xylemical\Code\LanguageInterface
   *   The language.
   */
  public function getLanguage(): LanguageInterface {
    return $this->manager->getLanguage();
  }

  /**
   * Get the name manager.
   *
   * @return \Xylemical\Code\NameManager
   *   The manager.
   */
  public function getNameManager(): NameManager {
    return $this->manager;
  }

  /**
   * Get the filename of the file.
   *
   * @return string
   *   The filename.
   */
  public function getFilename(): string {
    return $this->filename;
  }

  /**
   * Set the filename of the file.
   *
   * @param string $filename
   *   The filename.
   *
   * @return $this
   */
  public function setFilename(string $filename): static {
    $this->filename = $filename;
    return $this;
  }

  /**
   * Get the primary file for structures flag.
   *
   * @return bool
   *   The primary.
   */
  public function isPrimary(): bool {
    return $this->primary;
  }

  /**
   * Set the primary file for structures..
   *
   * @param bool $flag
   *   The primary.
   *
   * @return $this
   */
  public function setPrimary(bool $flag): static {
    $this->primary = $flag;
    return $this;
  }

  /**
   * Get the structures.
   *
   * @return \Xylemical\Code\Definition\StructureInterface[]
   *   The structures.
   */
  public function getStructures(): array {
    return array_values($this->structures);
  }

  /**
   * Get a structure.
   *
   * @param string $structure
   *   The structure.
   *
   * @return \Xylemical\Code\Definition\StructureInterface|null
   *   The structure or NULL.
   */
  public function getStructure(string $structure): ?StructureInterface {
    foreach ($this->structures as $struct) {
      if ((string) $struct === $structure) {
        return $struct;
      }
    }
    return NULL;
  }

  /**
   * Set the structures.
   *
   * @param \Xylemical\Code\Definition\StructureInterface[] $structures
   *   The structures.
   *
   * @return $this
   */
  public function setStructures(array $structures): static {
    $this->structures = [];
    $this->addStructures($structures);
    return $this;
  }

  /**
   * Add structures.
   *
   * @param \Xylemical\Code\Definition\StructureInterface[] $structures
   *   The structures.
   *
   * @return $this
   */
  public function addStructures(array $structures): static {
    foreach ($structures as $structure) {
      $this->addStructure($structure);
    }
    return $this;
  }

  /**
   * Add a structure.
   *
   * Structures must be in the same namespace to be able to be added to the
   * file.
   *
   * @param \Xylemical\Code\Definition\StructureInterface $structure
   *   The structure.
   *
   * @return $this
   */
  public function addStructure(StructureInterface $structure): static {
    if (!is_null($namespace = $this->getNamespace())) {
      if ($namespace != $structure->getFullyQualifiedName()->getNamespace()) {
        return $this;
      }
    }
    $this->structures[] = $structure;
    return $this;
  }

  /**
   * Remove a structure.
   *
   * @param string $structure
   *   The structure.
   *
   * @return $this
   */
  public function removeStructure(string $structure): static {
    $this->structures = array_filter($this->structures, function ($struct) use ($structure) {
      return (string) $struct !== $structure;
    });
    return $this;
  }

  /**
   * Check the file contains a structure.
   *
   * @param string $structure
   *   The structure.
   *
   * @return bool
   *   Thee result.
   */
  public function hasStructure(string $structure): bool {
    return $this->getStructure($structure) !== NULL;
  }

  /**
   * Get the namespace.
   *
   * @return string[]|null
   *   The namespace
   */
  public function getNamespace(): ?array {
    if (count($this->structures)) {
      $target = reset($this->structures);
      return $target->getFullyQualifiedName()->getNamespace();
    }
    return NULL;
  }

  /**
   * Create a File.
   *
   * @param string $filename
   *   The filename.
   * @param \Xylemical\Code\LanguageInterface|null $language
   *   The language.
   *
   * @return \Xylemical\Code\Definition\File
   *   The file.
   */
  public static function create(string $filename, ?LanguageInterface $language = NULL): File {
    return new File($filename, $language);
  }

}

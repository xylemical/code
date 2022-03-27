<?php

namespace Xylemical\Code\Definition;

/**
 * Extends definition with structures.
 */
trait StructureTrait {

  /**
   * The structures for this definition.
   *
   * @var \Xylemical\Code\Definition\StructureInterface[]
   */
  protected array $structures = [];

  /**
   * Set the structures for the definition.
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
   * Add the structures to the definition.
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
   * Add a structure to the definition.
   *
   * @param \Xylemical\Code\Definition\StructureInterface $structure
   *   The structure.
   *
   * @return $this
   */
  public function addStructure(StructureInterface $structure): static {
    $name = strtolower($structure->getName());
    if (!isset($this->structures[$name])) {
      $this->setStructure($structure);
    }
    return $this;
  }

  /**
   * Set an individual structure.
   *
   * @param \Xylemical\Code\Definition\StructureInterface $structure
   *   The structure.
   *
   * @return $this
   */
  public function setStructure(StructureInterface $structure): static {
    $this->structures[strtolower($structure->getName())] = $structure;
    return $this;
  }

  /**
   * Get a structure by name.
   *
   * @param string $name
   *   The structure.
   *
   * @return \Xylemical\Code\Definition\StructureInterface|null
   *   The structure.
   */
  public function getStructure(string $name): ?StructureInterface {
    $name = strtolower($name);
    if (isset($this->structures[$name])) {
      return $this->structures[$name];
    }
    return NULL;
  }

  /**
   * Get all the structures.
   *
   * @return \Xylemical\Code\Definition\StructureInterface[]
   *   The structures.
   */
  public function getStructures(): array {
    return array_values($this->structures);
  }

  /**
   * Remove a structure from the definition.
   *
   * @param string $structure
   *   The structure.
   *
   * @return $this
   */
  public function removeStructure(string $structure): static {
    $structure = strtolower($structure);
    unset($this->structures[$structure]);
    return $this;
  }

  /**
   *
   * Check there are structures defined.
   *
   * @return bool
   *   The result.
   */
  public function hasStructures(): bool {
    return count($this->structures) > 0;
  }

}

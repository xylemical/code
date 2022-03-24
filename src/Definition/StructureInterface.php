<?php

namespace Xylemical\Code\Definition;

use Xylemical\Code\DefinitionInterface;
use Xylemical\Code\FullyQualifiedName;

/**
 * Provides structure definition.
 */
interface StructureInterface extends DefinitionInterface {

  /**
   * Get the name of the definition.
   *
   * @return string
   *   The name.
   */
  public function getName(): string;

  /**
   * Set the name of the definition.
   *
   * @param string $name
   *   The name.
   *
   * @return $this
   */
  public function setName(string $name): static;

  /**
   * Get the fully qualified name.
   *
   * @return \Xylemical\Code\FullyQualifiedName
   *   The fully qualified name.
   */
  public function getFullyQualifiedName(): FullyQualifiedName;

  /**
   * Set the fully qualified name.
   *
   * @param \Xylemical\Code\FullyQualifiedName $name
   *   The fully qualified name.
   *
   * @return $this
   */
  public function setFullyQualifiedName(FullyQualifiedName $name): static;

}

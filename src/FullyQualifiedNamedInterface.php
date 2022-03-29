<?php

namespace Xylemical\Code;

/**
 * Provide for fully qualified names.
 */
interface FullyQualifiedNamedInterface extends NamedInterface {

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

<?php

namespace Xylemical\Code;

/**
 * Provides fully qualified name accessors.
 *
 * @see \Xylemical\Code\FullyQualifiedNamedInterface
 */
trait FullyQualifiedNameTrait {

  /**
   * The name of the definition.
   *
   * @var \Xylemical\Code\FullyQualifiedName
   */
  protected FullyQualifiedName $name;

  /**
   * Get the name of the definition.
   *
   * @return string
   *   The name.
   */
  public function getName(): string {
    return (string) $this->getFullyQualifiedName();
  }

  /**
   * Set the name of the definition.
   *
   * @param string $name
   *   The name.
   *
   * @return $this
   */
  public function setName(string $name): static {
    $this->name = new FullyQualifiedName($name);
    return $this;
  }

  /**
   * Get the fully qualified name.
   *
   * @return \Xylemical\Code\FullyQualifiedName
   *   The fully qualified name.
   */
  public function getFullyQualifiedName(): FullyQualifiedName {
    if (!isset($this->name)) {
      $this->name = new FullyQualifiedName('');
    }
    return $this->name;
  }

  /**
   * Set the fully qualified name.
   *
   * @param \Xylemical\Code\FullyQualifiedName $name
   *   The fully qualified name.
   *
   * @return $this
   */
  public function setFullyQualifiedName(FullyQualifiedName $name): static {
    $this->name = $name;
    return $this;
  }

}

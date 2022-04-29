<?php

declare(strict_types=1);

namespace Xylemical\Code;

/**
 * Provides simplified type accessors.
 */
trait TypeTrait {

  /**
   * The type of the definition.
   *
   * @var \Xylemical\Code\FullyQualifiedName
   */
  protected FullyQualifiedName $type;

  /**
   * Get the type of the definition.
   *
   * @return \Xylemical\Code\FullyQualifiedName
   *   The type.
   */
  public function getType(): FullyQualifiedName {
    if (!isset($this->type)) {
      $this->type = new FullyQualifiedName('');
    }
    return $this->type;
  }

  /**
   * Set the type of the definition.
   *
   * @param \Xylemical\Code\FullyQualifiedName $type
   *   The type.
   *
   * @return $this
   */
  public function setType(FullyQualifiedName $type): static {
    $this->type = $type;
    return $this;
  }

  /**
   * Check there is a type.
   *
   * @return bool
   *   The result.
   */
  public function hasType(): bool {
    return $this->getType()->getName() !== '';
  }

}

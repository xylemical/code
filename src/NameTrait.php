<?php

namespace Xylemical\Code;

/**
 * Provides simplified name accessors.
 */
trait NameTrait {

  /**
   * The name of the definition.
   *
   * @var string
   */
  protected string $name = 'undefined';

  /**
   * Get the name of the definition.
   *
   * @return string
   *   The name.
   */
  public function getName(): string {
    return $this->name;
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
    $this->name = $name;
    return $this;
  }

}

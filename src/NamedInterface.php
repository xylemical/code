<?php

declare(strict_types=1);

namespace Xylemical\Code;

/**
 * Provides definitions with a name.
 */
interface NamedInterface {

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

}

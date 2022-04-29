<?php

declare(strict_types=1);

namespace Xylemical\Code;

/**
 * Provides flexible documentation for definitions.
 */
interface DocumentationInterface extends DefinitionInterface {

  /**
   * Get the contents of the documentation.
   *
   * @return string
   *   The contents.
   */
  public function getContents(): string;

  /**
   * Check of the documentation is considered empty.
   *
   * @return bool
   *   The result.
   */
  public function isEmpty(): bool;

}

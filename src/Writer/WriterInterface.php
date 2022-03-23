<?php

namespace Xylemical\Code\Writer;

use Xylemical\Code\DefinitionInterface;

/**
 * Provide writer of code definitions.
 */
interface WriterInterface {

  /**
   * Write a code definition to a string.
   *
   * @param \Xylemical\Code\DefinitionInterface $definition
   *   The definition.
   *
   * @return string
   *   The output.
   */
  public function write(DefinitionInterface $definition): string;

}

<?php

declare(strict_types=1);

namespace Xylemical\Code\Reader;

use Xylemical\Code\DefinitionInterface;

/**
 * Provide reader of code definitions.
 */
interface ReaderInterface {

  /**
   * Write a code definition to a string.
   *
   * @param string $code
   *   The code.
   *
   * @return \Xylemical\Code\DefinitionInterface
   *   The definition.
   */
  public function write(string $code): DefinitionInterface;

}

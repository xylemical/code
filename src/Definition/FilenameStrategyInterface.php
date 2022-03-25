<?php

namespace Xylemical\Code\Definition;

use Xylemical\Code\FullyQualifiedName;

/**
 * Provides a strategy for filenames for fully qualified names.
 */
interface FilenameStrategyInterface {

  /**
   * Get the filenames containing the structure for a fully qualified name.
   *
   * @param \Xylemical\Code\FullyQualifiedName $name
   *   The fully qualified name.
   *
   * @return string[]
   *   The filename.
   */
  public function getFilenames(FullyQualifiedName $name): array;

}

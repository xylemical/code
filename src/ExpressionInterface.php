<?php

namespace Xylemical\Code;

/**
 * Provide for executable expressions.
 */
interface ExpressionInterface {

  /**
   * Check the expression is empty.
   *
   * @return bool
   *   The result.
   */
  public function isEmpty(): bool;

  /**
   * Get the contents of the expression.
   *
   * @return string
   *   The contents.
   */
  public function getContents(): string;

}

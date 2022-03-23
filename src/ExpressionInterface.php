<?php

namespace Xylemical\Code;

/**
 * Provide for executable expressions.
 */
interface ExpressionInterface extends DefinitionInterface {

  /**
   * Check the expression is empty.
   *
   * @return bool
   *   The result.
   */
  public function isEmpty(): bool;

  /**
   * Get the code representation of the expression.
   *
   * @return \Xylemical\Code\Code
   *   The contents.
   */
  public function getCode(): Code;

}

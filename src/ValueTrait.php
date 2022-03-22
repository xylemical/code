<?php

namespace Xylemical\Code;

/**
 * Provides for a value to exist.
 */
trait ValueTrait {

  /**
   * The value of the definition.
   *
   * @var \Xylemical\Code\ExpressionInterface
   */
  protected ExpressionInterface $value;

  /**
   * Get the value of the definition.
   *
   * @return \Xylemical\Code\ExpressionInterface
   *   The value.
   */
  public function getValue(): ExpressionInterface {
    if (!isset($this->value)) {
      $this->value = new Expression();
    }
    return $this->value;
  }

  /**
   * Set the value of the definition.
   *
   * @param \Xylemical\Code\ExpressionInterface $value
   *   The value of the definition.
   *
   * @return $this
   */
  public function setValue(ExpressionInterface $value): static {
    $this->value = $value;
    return $this;
  }

}

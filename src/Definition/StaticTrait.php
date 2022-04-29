<?php

declare(strict_types=1);

namespace Xylemical\Code\Definition;

/**
 * Extends definition by allowing static behaviour.
 */
trait StaticTrait {

  /**
   * The definition is static.
   *
   * @var bool
   */
  protected bool $static = FALSE;

  /**
   * Check the definition is static.
   *
   * @return bool
   *   The result.
   */
  public function isStatic(): bool {
    return $this->static;
  }

  /**
   * Set the definition static flag.
   *
   * @param bool $flag
   *   The flag.
   *
   * @return $this
   */
  public function setStatic(bool $flag): static {
    $this->static = $flag;
    return $this;
  }

}

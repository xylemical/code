<?php

declare(strict_types=1);

namespace Xylemical\Code\Definition;

/**
 * Extends definition by allowing abstract behaviour.
 */
trait AbstractTrait {

  /**
   * The definition is abstract.
   *
   * @var bool
   */
  protected bool $abstract = FALSE;

  /**
   * Check the definition is abstract.
   *
   * @return bool
   *   The result.
   */
  public function isAbstract(): bool {
    return $this->abstract;
  }

  /**
   * Set the definition abstract flag.
   *
   * @param bool $flag
   *   The flag.
   *
   * @return $this
   */
  public function setAbstract(bool $flag): static {
    $this->abstract = $flag;
    return $this;
  }

}

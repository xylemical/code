<?php

declare(strict_types=1);

namespace Xylemical\Code\Definition;

/**
 * Extends definition with constants.
 */
trait ConstantTrait {

  /**
   * The constants for this structure.
   *
   * @var \Xylemical\Code\Definition\Constant[]
   */
  protected array $constants = [];

  /**
   * Set the constants for the definition.
   *
   * @param \Xylemical\Code\Definition\Constant[] $constants
   *   The constants.
   *
   * @return $this
   */
  public function setConstants(array $constants): static {
    $this->constants = [];
    $this->addConstants($constants);
    return $this;
  }

  /**
   * Add the constants to the definition.
   *
   * @param \Xylemical\Code\Definition\Constant[] $constants
   *   The constants.
   *
   * @return $this
   */
  public function addConstants(array $constants): static {
    foreach ($constants as $constant) {
      $this->addConstant($constant);
    }
    return $this;
  }

  /**
   * Add a constant to the definition.
   *
   * @param \Xylemical\Code\Definition\Constant $constant
   *   The constant.
   *
   * @return $this
   */
  public function addConstant(Constant $constant): static {
    $name = strtolower($constant->getName());
    if (!isset($this->constants[$name])) {
      $this->setConstant($constant);
    }
    return $this;
  }

  /**
   * Set an individual constant.
   *
   * @param \Xylemical\Code\Definition\Constant $constant
   *   The constant.
   *
   * @return $this
   */
  public function setConstant(Constant $constant): static {
    $this->constants[strtolower($constant->getName())] = $constant;
    return $this;
  }

  /**
   * Get a constant by name.
   *
   * @param string $name
   *   The constant.
   *
   * @return \Xylemical\Code\Definition\Constant|null
   *   The constant.
   */
  public function getConstant(string $name): ?Constant {
    $name = strtolower($name);
    if (isset($this->constants[$name])) {
      return $this->constants[$name];
    }
    return NULL;
  }

  /**
   * Get all the constants.
   *
   * @return \Xylemical\Code\Definition\Constant[]
   *   The constants.
   */
  public function getConstants(): array {
    return array_values($this->constants);
  }

  /**
   * Remove a constant from the definition.
   *
   * @param string $constant
   *   The constant.
   *
   * @return $this
   */
  public function removeConstant(string $constant): static {
    $constant = strtolower($constant);
    unset($this->constants[$constant]);
    return $this;
  }

  /**
   * Check there are constants defined.
   *
   * @return bool
   *   The result.
   */
  public function hasConstants(): bool {
    return count($this->constants) > 0;
  }

}

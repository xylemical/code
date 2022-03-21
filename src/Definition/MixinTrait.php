<?php

namespace Xylemical\Code\Definition;

/**
 * Extends definition with mixins.
 */
trait MixinTrait {

  /**
   * The mixins for this definition.
   *
   * @var \Xylemical\Code\Definition\Mixin[]
   */
  protected array $mixins = [];

  /**
   * Set the mixins for the definition.
   *
   * @param \Xylemical\Code\Definition\Mixin[] $mixins
   *   The mixins.
   *
   * @return $this
   */
  public function setMixins(array $mixins): static {
    $this->mixins = [];
    $this->addMixins($mixins);
    return $this;
  }

  /**
   * Add the mixins to the definition.
   *
   * @param \Xylemical\Code\Definition\Mixin[] $mixins
   *   The mixins.
   *
   * @return $this
   */
  public function addMixins(array $mixins): static {
    foreach ($mixins as $mixin) {
      $this->setMixin($mixin);
    }
    return $this;
  }

  /**
   * Set an individual mixin.
   *
   * @param \Xylemical\Code\Definition\Mixin $mixin
   *   The mixin.
   *
   * @return $this
   */
  public function setMixin(Mixin $mixin): static {
    $this->mixins[strtolower($mixin->getName())] = $mixin;
    return $this;
  }

  /**
   * Get a mixin by name.
   *
   * @param string $name
   *   The mixin.
   *
   * @return \Xylemical\Code\Definition\Mixin|null
   *   The mixin.
   */
  public function getMixin(string $name): ?Mixin {
    $name = strtolower($name);
    if (isset($this->mixins[$name])) {
      return $this->mixins[$name];
    }
    return NULL;
  }

  /**
   * Remove a mixin from the definition.
   *
   * @param string $mixin
   *   The mixin.
   *
   * @return $this
   */
  public function removeMixin(string $mixin): static {
    $mixin = strtolower($mixin);
    unset($this->mixins[$mixin]);
    return $this;
  }

}

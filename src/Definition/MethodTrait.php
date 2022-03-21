<?php

namespace Xylemical\Code\Definition;

/**
 * Extends definition with methods.
 */
trait MethodTrait {

  /**
   * The methods for this definition.
   *
   * @var \Xylemical\Code\Definition\Method[]
   */
  protected array $methods = [];

  /**
   * Set the methods for the definition.
   *
   * @param \Xylemical\Code\Definition\Method[] $methods
   *   The methods.
   *
   * @return $this
   */
  public function setMethods(array $methods): static {
    $this->methods = [];
    $this->addMethods($methods);
    return $this;
  }

  /**
   * Add the methods to the definition.
   *
   * @param \Xylemical\Code\Definition\Method[] $methods
   *   The methods.
   *
   * @return $this
   */
  public function addMethods(array $methods): static {
    foreach ($methods as $method) {
      $this->setMethod($method);
    }
    return $this;
  }

  /**
   * Set an individual method.
   *
   * @param \Xylemical\Code\Definition\Method $method
   *   The method.
   *
   * @return $this
   */
  public function setMethod(Method $method): static {
    $this->methods[strtolower($method->getName())] = $method;
    return $this;
  }

  /**
   * Get a method by name.
   *
   * @param string $name
   *   The method.
   *
   * @return \Xylemical\Code\Definition\Method|null
   *   The method.
   */
  public function getMethod(string $name): ?Method {
    $name = strtolower($name);
    if (isset($this->methods[$name])) {
      return $this->methods[$name];
    }
    return NULL;
  }

  /**
   * Remove a method from the definition.
   *
   * @param string $method
   *   The method.
   *
   * @return $this
   */
  public function removeMethod(string $method): static {
    $method = strtolower($method);
    unset($this->methods[$method]);
    return $this;
  }

}

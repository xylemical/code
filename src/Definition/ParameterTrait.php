<?php

namespace Xylemical\Code\Definition;

/**
 * Extends definition with parameters.
 */
trait ParameterTrait {

  /**
   * The parameters for the definition.
   *
   * @var \Xylemical\Code\Definition\Parameter[]
   */
  protected array $parameters = [];

  /**
   * Set the parameters for the definition.
   *
   * @param \Xylemical\Code\Definition\Parameter[] $parameters
   *   The parameters.
   *
   * @return $this
   */
  public function setParameters(array $parameters): static {
    $this->parameters = [];
    $this->addParameters($parameters);
    return $this;
  }

  /**
   * Add the parameters to the definition.
   *
   * @param \Xylemical\Code\Definition\Parameter[] $parameters
   *   The parameters.
   *
   * @return $this
   */
  public function addParameters(array $parameters): static {
    foreach ($parameters as $parameter) {
      $this->setParameter($parameter);
    }
    return $this;
  }

  /**
   * Set an individual parameter.
   *
   * @param \Xylemical\Code\Definition\Parameter $parameter
   *   The parameter.
   *
   * @return $this
   */
  public function setParameter(Parameter $parameter): static {
    $this->parameters[strtolower($parameter->getName())] = $parameter;
    return $this;
  }

  /**
   * Get a parameter by name.
   *
   * @param string $name
   *   The parameter.
   *
   * @return \Xylemical\Code\Definition\Parameter|null
   *   The parameter.
   */
  public function getParameter(string $name): ?Parameter {
    $name = strtolower($name);
    if (isset($this->parameters[$name])) {
      return $this->parameters[$name];
    }
    return NULL;
  }

  /**
   * Get all the parameters.
   *
   * @return \Xylemical\Code\Definition\Parameter[]
   *   The parameters.
   */
  public function getParameters(): array {
    return array_values($this->parameters);
  }

  /**
   * Remove a parameter from the definition.
   *
   * @param string $parameter
   *   The parameter.
   *
   * @return $this
   */
  public function removeParameter(string $parameter): static {
    $parameter = strtolower($parameter);
    unset($this->parameters[$parameter]);
    return $this;
  }

}

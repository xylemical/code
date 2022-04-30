<?php

declare(strict_types=1);

namespace Xylemical\Code\Definition;

/**
 * Provides a method definition.
 */
class Method extends AbstractElement {

  /**
   * The parameters.
   *
   * @var \Xylemical\Code\Definition\Parameter[]
   */
  protected array $parameters = [];

  /**
   * Get the parameters.
   *
   * @return \Xylemical\Code\Definition\Parameter[]
   *   The parameters.
   */
  public function getParameters(): array {
    return array_values($this->parameters);
  }

  /**
   * Get a parameter.
   *
   * @param string $parameter
   *   The name.
   *
   * @return \Xylemical\Code\Definition\Parameter|null
   *   The parameter or NULL.
   */
  public function getParameter(string $parameter): ?Parameter {
    foreach ($this->parameters as $param) {
      if ($param->getName() === $parameter) {
        return $param;
      }
    }
    return NULL;
  }

  /**
   * Set the parameters.
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
   * Add parameters.
   *
   * @param \Xylemical\Code\Definition\Parameter[] $parameters
   *   The parameters.
   *
   * @return $this
   */
  public function addParameters(array $parameters): static {
    foreach ($parameters as $parameter) {
      $this->addParameter($parameter);
    }
    return $this;
  }

  /**
   * Add a parameter.
   *
   * @param \Xylemical\Code\Definition\Parameter $parameter
   *   The parameter.
   *
   * @return $this
   */
  public function addParameter(Parameter $parameter): static {
    $this->parameters[] = $parameter;
    return $this;
  }

  /**
   * Remove a parameter.
   *
   * @param string $parameter
   *   The parameter.
   *
   * @return $this
   */
  public function removeParameter(string $parameter): static {
    $this->parameters = array_filter($this->parameters, function ($param) use ($parameter) {
      return $param->getName() !== $parameter;
    });
    return $this;
  }

  /**
   * Check the method has a parameter.
   *
   * @param string $parameter
   *   The parameter.
   *
   * @return bool
   *   The result.
   */
  public function hasParameter(string $parameter): bool {
    return $this->getParameter($parameter) !== NULL;
  }

}

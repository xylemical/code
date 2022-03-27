<?php

namespace Xylemical\Code\Definition;

/**
 * Extends definition with constants.
 */
trait PropertyTrait {

  /**
   * The properties for the definition.
   *
   * @var \Xylemical\Code\Definition\Property[]
   */
  protected array $properties = [];

  /**
   * Set the properties for the definition.
   *
   * @param \Xylemical\Code\Definition\Property[] $properties
   *   The properties.
   *
   * @return $this
   */
  public function setProperties(array $properties): static {
    $this->properties = [];
    $this->addProperties($properties);
    return $this;
  }

  /**
   * Add the properties to the definition.
   *
   * @param \Xylemical\Code\Definition\Property[] $properties
   *   The properties.
   *
   * @return $this
   */
  public function addProperties(array $properties): static {
    foreach ($properties as $property) {
      $this->addProperty($property);
    }
    return $this;
  }

  /**
   * Add a property to the definition.
   *
   * @param \Xylemical\Code\Definition\Property $property
   *   The property.
   *
   * @return $this
   */
  public function addProperty(Property $property): static {
    $name = strtolower($property->getName());
    if (!isset($this->properties[$name])) {
      $this->setProperty($property);
    }
    return $this;
  }

  /**
   * Set an individual property.
   *
   * @param \Xylemical\Code\Definition\Property $property
   *   The property.
   *
   * @return $this
   */
  public function setProperty(Property $property): static {
    $this->properties[strtolower($property->getName())] = $property;
    return $this;
  }

  /**
   * Get a property by name.
   *
   * @param string $name
   *   The property.
   *
   * @return \Xylemical\Code\Definition\Property|null
   *   The property.
   */
  public function getProperty(string $name): ?Property {
    $name = strtolower($name);
    if (isset($this->properties[$name])) {
      return $this->properties[$name];
    }
    return NULL;
  }

  /**
   * Get all the properties.
   *
   * @return \Xylemical\Code\Definition\Property[]
   *   The properties.
   */
  public function getProperties(): array {
    return array_values($this->properties);
  }

  /**
   * Remove a property from the definition.
   *
   * @param string $property
   *   The property.
   *
   * @return $this
   */
  public function removeProperty(string $property): static {
    $property = strtolower($property);
    unset($this->properties[$property]);
    return $this;
  }

  /**
   * Check there are properties defined.
   *
   * @return bool
   *   The result.
   */
  public function hasProperties(): bool {
    return count($this->properties) > 0;
  }

}

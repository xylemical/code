<?php

declare(strict_types=1);

namespace Xylemical\Code\Definition;

use Xylemical\Code\DefinitionInterface;
use Xylemical\Code\Documentation;
use Xylemical\Code\DocumentationInterface;
use Xylemical\Code\ExpressionInterface;
use Xylemical\Code\FullyQualifiedName;
use Xylemical\Code\NameManager;

/**
 * Provides a parameter definition.
 */
class Parameter implements DefinitionInterface, \Stringable {

  /**
   * The name manager.
   *
   * @var \Xylemical\Code\NameManager
   */
  protected NameManager $manager;

  /**
   * The name of the definition.
   *
   * @var string
   */
  protected string $name;

  /**
   * The documentation of the definition.
   *
   * @var \Xylemical\Code\DocumentationInterface
   */
  protected DocumentationInterface $documentation;

  /**
   * The type.
   *
   * @var \Xylemical\Code\FullyQualifiedName|null
   */
  protected ?FullyQualifiedName $type = NULL;

  /**
   * The value.
   *
   * @var \Xylemical\Code\ExpressionInterface|null
   */
  protected ?ExpressionInterface $value = NULL;

  /**
   * Parameter constructor.
   *
   * @param string $name
   *   The name.
   * @param \Xylemical\Code\NameManager $manager
   *   The name manager.
   */
  public function __construct(string $name, NameManager $manager) {
    $this->name = $name;
    $this->manager = $manager;
  }

  /**
   * Get the name of the definition.
   *
   * @return string
   *   The name.
   */
  public function getName(): string {
    return $this->name;
  }

  /**
   * Set the name of the definition.
   *
   * @param string $name
   *   The name.
   *
   * @return $this
   */
  public function setName(string $name): static {
    $this->name = $name;
    return $this;
  }

  /**
   * Get the documentation of the definition.
   *
   * @return \Xylemical\Code\DocumentationInterface
   *   The documentation.
   */
  public function getDocumentation(): DocumentationInterface {
    if (!isset($this->documentation)) {
      $this->documentation = new Documentation();
    }
    return $this->documentation;
  }

  /**
   * Set the documentation of the definition.
   *
   * @param \Xylemical\Code\DocumentationInterface $documentation
   *   The documentation.
   *
   * @return $this
   */
  public function setDocumentation(DocumentationInterface $documentation): static {
    $this->documentation = $documentation;
    return $this;
  }

  /**
   * Get the type.
   *
   * @return \Xylemical\Code\FullyQualifiedName|null
   *   The type.
   */
  public function getType(): ?FullyQualifiedName {
    return $this->type;
  }

  /**
   * Set the type.
   *
   * @param string $name
   *   The type.
   *
   * @return $this
   */
  public function setType(string $name): static {
    $this->type = $name ? $this->manager->get($name) : NULL;
    return $this;
  }

  /**
   * Get the value of the definition.
   *
   * @return \Xylemical\Code\ExpressionInterface|null
   *   The value.
   */
  public function getValue(): ?ExpressionInterface {
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

  /**
   * {@inheritdoc}
   */
  public function __toString() {
    return $this->name;
  }

  /**
   * Create a Parameter.
   *
   * @param string $name
   *   The name.
   * @param \Xylemical\Code\NameManager $manager
   *   The name manager.
   *
   * @return \Xylemical\Code\Definition\Parameter
   *   The parameter.
   */
  public static function create(string $name, NameManager $manager): Parameter {
    return new Parameter($name, $manager);
  }

}

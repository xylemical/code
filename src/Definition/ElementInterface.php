<?php

declare(strict_types=1);

namespace Xylemical\Code\Definition;

use Xylemical\Code\DefinitionInterface;
use Xylemical\Code\DocumentationInterface;
use Xylemical\Code\ExpressionInterface;
use Xylemical\Code\FullyQualifiedName;
use Xylemical\Code\Visibility;

/**
 * Provides an element of a structure.
 */
interface ElementInterface extends DefinitionInterface, \Stringable {

  /**
   * Get the name of the definition.
   *
   * @return string
   *   The name.
   */
  public function getName(): string;

  /**
   * Set the name of the definition.
   *
   * @param string $name
   *   The name.
   *
   * @return $this
   */
  public function setName(string $name): static;

  /**
   * Get the documentation of the element.
   *
   * @return \Xylemical\Code\DocumentationInterface
   *   The documentation.
   */
  public function getDocumentation(): DocumentationInterface;

  /**
   * Set the documentation of the element.
   *
   * @param \Xylemical\Code\DocumentationInterface $documentation
   *   The documentation.
   *
   * @return $this
   */
  public function setDocumentation(DocumentationInterface $documentation): static;

  /**
   * Get the visibility.
   *
   * @return \Xylemical\Code\Visibility
   *   The visibility.
   */
  public function getVisibility(): Visibility;

  /**
   * Set the visibility for the object.
   *
   * @param int $visibility
   *   The visibility.
   *
   * @return $this
   */
  public function setVisibility(int $visibility): static;

  /**
   * Check the structure is final.
   *
   * @return bool
   *   The result.
   */
  public function isFinal(): bool;

  /**
   * Set the structure final flag.
   *
   * @param bool $flag
   *   The flag.
   *
   * @return $this
   */
  public function setFinal(bool $flag): static;

  /**
   * Check the structure is abstract.
   *
   * @return bool
   *   The result.
   */
  public function isAbstract(): bool;

  /**
   * Set the structure abstract flag.
   *
   * @param bool $flag
   *   The flag.
   *
   * @return $this
   */
  public function setAbstract(bool $flag): static;

  /**
   * Check the structure is static.
   *
   * @return bool
   *   The result.
   */
  public function isStatic(): bool;

  /**
   * Set the structure static flag.
   *
   * @param bool $flag
   *   The flag.
   *
   * @return $this
   */
  public function setStatic(bool $flag): static;

  /**
   * Get the type of the element.
   *
   * @return \Xylemical\Code\FullyQualifiedName|null
   *   The type.
   */
  public function getType(): ?FullyQualifiedName;

  /**
   * Set the type of the element.
   *
   * @param string $name
   *   The type name, or empty.
   *
   * @return $this
   */
  public function setType(string $name): static;

  /**
   * Get the expression value of the element.
   *
   * @return \Xylemical\Code\ExpressionInterface|null
   *   The expression.
   */
  public function getValue(): ?ExpressionInterface;

  /**
   * Set the expression value of the element.
   *
   * @param \Xylemical\Code\ExpressionInterface|null $expression
   *   The expression.
   *
   * @return $this
   */
  public function setValue(?ExpressionInterface $expression): static;

}

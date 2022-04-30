<?php

declare(strict_types=1);

namespace Xylemical\Code\Definition;

use Xylemical\Code\DefinitionInterface;
use Xylemical\Code\DocumentationInterface;
use Xylemical\Code\FullyQualifiedName;

/**
 * Provides structure definition.
 */
interface StructureInterface extends DefinitionInterface, \Stringable {

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
   * Get the fully qualified name.
   *
   * @return \Xylemical\Code\FullyQualifiedName
   *   The fully qualified name.
   */
  public function getFullyQualifiedName(): FullyQualifiedName;

  /**
   * Set the fully qualified name.
   *
   * @param \Xylemical\Code\FullyQualifiedName $name
   *   The fully qualified name.
   *
   * @return $this
   */
  public function setFullyQualifiedName(FullyQualifiedName $name): static;

  /**
   * Get the documentation of the structure.
   *
   * @return \Xylemical\Code\DocumentationInterface
   *   The documentation.
   */
  public function getDocumentation(): DocumentationInterface;

  /**
   * Set the documentation of the structure.
   *
   * @param \Xylemical\Code\DocumentationInterface $documentation
   *   The documentation.
   *
   * @return $this
   */
  public function setDocumentation(DocumentationInterface $documentation): static;

  /**
   * Get the elements for the structure.
   *
   * @return \Xylemical\Code\Definition\ElementInterface[]
   *   The elements.
   */
  public function getElements(): array;

  /**
   * Get the element.
   *
   * @param string $element
   *   The element.
   *
   * @return \Xylemical\Code\Definition\ElementInterface|null
   *   The element or NULL.
   */
  public function getElement(string $element): ?ElementInterface;

  /**
   * Set the elements for the structure.
   *
   * @param \Xylemical\Code\Definition\ElementInterface[] $elements
   *   The elements.
   *
   * @return $this
   */
  public function setElements(array $elements): static;

  /**
   * Add elements to the structure.
   *
   * @param \Xylemical\Code\Definition\ElementInterface[] $elements
   *   The elements.
   *
   * @return $this
   */
  public function addElements(array $elements): static;

  /**
   * Add an element to the structure.
   *
   * @param \Xylemical\Code\Definition\ElementInterface $element
   *   The element.
   *
   * @return $this
   */
  public function addElement(ElementInterface $element): static;

  /**
   * Remove an element from the structure.
   *
   * @param string $element
   *   The element.
   *
   * @return $this
   */
  public function removeElement(string $element): static;

  /**
   * Check the structure has a element.
   *
   * @param string $element
   *   The element.
   *
   * @return bool
   *   The result.
   */
  public function hasElement(string $element): bool;

  /**
   * Get the contracts for the structure.
   *
   * @return \Xylemical\Code\FullyQualifiedName[]
   *   The contracts.
   */
  public function getContracts(): array;

  /**
   * Set the contracts for the structure.
   *
   * @param string[] $contracts
   *   The contracts.
   *
   * @return $this
   */
  public function setContracts(array $contracts): static;

  /**
   * Add contracts to the structure.
   *
   * @param string[] $contracts
   *   The contracts.
   *
   * @return $this
   */
  public function addContracts(array $contracts): static;

  /**
   * Add a contract to the structure.
   *
   * @param string $contract
   *   The contract.
   *
   * @return $this
   */
  public function addContract(string $contract): static;

  /**
   * Remove a contract from the structure.
   *
   * @param string $contract
   *   The contract.
   *
   * @return $this
   */
  public function removeContract(string $contract): static;

  /**
   * Check the structure has a contract.
   *
   * @param string $contract
   *   The contract.
   *
   * @return bool
   *   The result.
   */
  public function hasContract(string $contract): bool;

  /**
   * Get the mixins for the structure.
   *
   * @return \Xylemical\Code\FullyQualifiedName[]
   *   The mixins.
   */
  public function getMixins(): array;

  /**
   * Set the mixins for the structure.
   *
   * @param string[] $mixins
   *   The mixins.
   *
   * @return $this
   */
  public function setMixins(array $mixins): static;

  /**
   * Add mixins to the structure.
   *
   * @param string[] $mixins
   *   The mixins.
   *
   * @return $this
   */
  public function addMixins(array $mixins): static;

  /**
   * Add a mixin to the structure.
   *
   * @param string $mixin
   *   The mixin.
   *
   * @return $this
   */
  public function addMixin(string $mixin): static;

  /**
   * Remove a mixin from the structure.
   *
   * @param string $mixin
   *   The mixin.
   *
   * @return $this
   */
  public function removeMixin(string $mixin): static;

  /**
   * Check the structure has a mixin.
   *
   * @param string $mixin
   *   The mixin.
   *
   * @return bool
   *   The result.
   */
  public function hasMixin(string $mixin): bool;

  /**
   * Get the parent of the structure.
   *
   * @return \Xylemical\Code\FullyQualifiedName|null
   *   The parent.
   */
  public function getParent(): ?FullyQualifiedName;

  /**
   * Check the structure has a parent.
   *
   * @return bool
   *   The result.
   */
  public function hasParent(): bool;

  /**
   * Set the parent of the structure.
   *
   * @param string $parent
   *   The parent. Set empty to remove parent.
   *
   * @return $this
   */
  public function setParent(string $parent): static;

}

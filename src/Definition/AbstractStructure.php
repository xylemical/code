<?php

declare(strict_types=1);

namespace Xylemical\Code\Definition;

use Xylemical\Code\Documentation;
use Xylemical\Code\DocumentationInterface;
use Xylemical\Code\FullyQualifiedName;
use Xylemical\Code\NameManager;

/**
 * Provides the base structure for contracts, mixins and structures.
 */
abstract class AbstractStructure implements StructureInterface {

  /**
   * The name manager.
   *
   * @var \Xylemical\Code\NameManager
   */
  protected NameManager $manager;

  /**
   * The fully qualified name of the structure.
   *
   * @var \Xylemical\Code\FullyQualifiedName
   */
  protected FullyQualifiedName $name;

  /**
   * The documentation.
   *
   * @var \Xylemical\Code\DocumentationInterface
   */
  protected DocumentationInterface $documentation;

  /**
   * The contracts.
   *
   * @var \Xylemical\Code\FullyQualifiedName[]
   */
  protected array $contracts = [];

  /**
   * The mixins.
   *
   * @var \Xylemical\Code\FullyQualifiedName[]
   */
  protected array $mixins = [];

  /**
   * The elements of the structure.
   *
   * @var \Xylemical\Code\Definition\ElementInterface[]
   */
  protected array $elements = [];

  /**
   * AbstractStructure constructor.
   *
   * @param string $name
   *   The structure name.
   * @param \Xylemical\Code\NameManager $manager
   *   The name manager.
   */
  final public function __construct(string $name, NameManager $manager) {
    $this->name = $manager->get($name);
    $this->manager = $manager;
  }

  /**
   * {@inheritdoc}
   */
  public function getName(): string {
    return (string) $this->name;
  }

  /**
   * {@inheritdoc}
   */
  public function setName(string $name): static {
    $this->name = $this->manager->get($name);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getFullyQualifiedName(): FullyQualifiedName {
    return $this->name;
  }

  /**
   * {@inheritdoc}
   */
  public function setFullyQualifiedName(FullyQualifiedName $name): static {
    $this->name = $this->manager->getName($name);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getDocumentation(): DocumentationInterface {
    if (!isset($this->documentation)) {
      $this->documentation = new Documentation();
    }
    return $this->documentation;
  }

  /**
   * {@inheritdoc}
   */
  public function setDocumentation(DocumentationInterface $documentation): static {
    $this->documentation = $documentation;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getElements(): array {
    return array_values($this->elements);
  }

  /**
   * {@inheritdoc}
   */
  public function getElement(string $element): ?ElementInterface {
    foreach ($this->elements as $item) {
      if ($item->getName() === $element) {
        return $item;
      }
    }
    return NULL;
  }

  /**
   * {@inheritdoc}
   */
  public function setElements(array $elements): static {
    $this->elements = [];
    $this->addElements($elements);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function addElements(array $elements): static {
    foreach ($elements as $element) {
      $this->addElement($element);
    }
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function addElement(ElementInterface $element): static {
    $this->elements[] = $element;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function removeElement(string $element): static {
    $this->elements = array_filter($this->elements, function ($item) use ($element) {
      return $item->getName() !== $element;
    });
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function hasElement(string $element): bool {
    foreach ($this->elements as $item) {
      if ($item->getName() === $element) {
        return TRUE;
      }
    }
    return FALSE;
  }

  /**
   * {@inheritdoc}
   */
  public function getContracts(): array {
    return array_values($this->contracts);
  }

  /**
   * {@inheritdoc}
   */
  public function setContracts(array $contracts): static {
    $this->contracts = [];
    $this->addContracts($contracts);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function addContracts(array $contracts): static {
    foreach ($contracts as $contract) {
      $this->addContract($contract);
    }
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function addContract(string $contract): static {
    $this->contracts[] = $this->manager->get($contract);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function removeContract(string $contract): static {
    $this->contracts = array_filter($this->contracts, function ($item) use ($contract) {
      return $item->getFullName() !== $contract;
    });
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function hasContract(string $contract): bool {
    foreach ($this->contracts as $item) {
      if ($item->getFullName() === $contract) {
        return TRUE;
      }
    }
    return FALSE;
  }

  /**
   * {@inheritdoc}
   */
  public function getMixins(): array {
    return array_values($this->mixins);
  }

  /**
   * {@inheritdoc}
   */
  public function setMixins(array $mixins): static {
    $this->mixins = [];
    $this->addMixins($mixins);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function addMixins(array $mixins): static {
    foreach ($mixins as $mixin) {
      $this->addMixin($mixin);
    }
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function addMixin(string $mixin): static {
    $this->mixins[] = $this->manager->get($mixin);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function removeMixin(string $mixin): static {
    $this->mixins = array_filter($this->mixins, function ($item) use ($mixin) {
      return $item->getFullName() !== $mixin;
    });
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function hasMixin(string $mixin): bool {
    foreach ($this->mixins as $item) {
      if ($item->getFullName() === $mixin) {
        return TRUE;
      }
    }
    return FALSE;
  }

  /**
   * {@inheritdoc}
   */
  public function getParent(): ?FullyQualifiedName {
    return NULL;
  }

  /**
   * {@inheritdoc}
   */
  public function hasParent(): bool {
    return FALSE;
  }

  /**
   * {@inheritdoc}
   */
  public function setParent(string $parent): static {
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function __toString(): string {
    return (string) $this->name;
  }

  /**
   * Create a structure.
   *
   * @param string $name
   *   The name.
   * @param \Xylemical\Code\NameManager $manager
   *   The name manager.
   *
   * @return \Xylemical\Code\Definition\AbstractStructure
   *   The structure.
   */
  final public static function create(string $name, NameManager $manager): AbstractStructure {
    return new static($name, $manager);
  }

}

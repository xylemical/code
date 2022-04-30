<?php

declare(strict_types=1);

namespace Xylemical\Code\Definition;

use Xylemical\Code\FullyQualifiedName;

/**
 * The equivalent of a php object.
 */
class Structure extends AbstractStructure {

  /**
   * The object is final, and cannot be inherited from.
   *
   * @var bool
   */
  protected bool $final = FALSE;

  /**
   * The object is abstract, cannot be instantiated.
   *
   * @var bool
   */
  protected bool $abstract = FALSE;

  /**
   * The parent structure.
   *
   * @var \Xylemical\Code\FullyQualifiedName|null
   */
  protected ?FullyQualifiedName $parent = NULL;

  /**
   * Check the structure is final.
   *
   * @return bool
   *   The result.
   */
  public function isFinal(): bool {
    return $this->final;
  }

  /**
   * Set the structure final flag.
   *
   * @param bool $flag
   *   The flag.
   *
   * @return $this
   */
  public function setFinal(bool $flag): static {
    $this->final = $flag;
    return $this;
  }

  /**
   * Check the structure is abstract.
   *
   * @return bool
   *   The result.
   */
  public function isAbstract(): bool {
    return $this->abstract;
  }

  /**
   * Set the structure abstract flag.
   *
   * @param bool $flag
   *   The flag.
   *
   * @return $this
   */
  public function setAbstract(bool $flag): static {
    $this->abstract = $flag;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getParent(): ?FullyQualifiedName {
    return $this->parent;
  }

  /**
   * {@inheritdoc}
   */
  public function hasParent(): bool {
    return !is_null($this->parent);
  }

  /**
   * {@inheritdoc}
   */
  public function setParent(string $parent): static {
    $this->parent = $parent ? $this->manager->get($parent) : NULL;
    return $this;
  }

}

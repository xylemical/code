<?php

declare(strict_types=1);

namespace Xylemical\Code\Definition;

use Xylemical\Code\DocumentationTrait;
use Xylemical\Code\FullyQualifiedName;
use Xylemical\Code\FullyQualifiedNamedInterface;
use Xylemical\Code\FullyQualifiedNameTrait;
use Xylemical\Code\ObjectManager;
use Xylemical\Code\VisibilityTrait;

/**
 * The equivalent of a php object.
 */
class Structure implements StructureInterface, FullyQualifiedNamedInterface {

  use AbstractTrait;
  use ConstantTrait;
  use ContractTrait;
  use DocumentationTrait;
  use FullyQualifiedNameTrait;
  use MethodTrait;
  use MixinTrait;
  use PropertyTrait;
  use VisibilityTrait;

  /**
   * The object is final, and cannot be inherited from.
   *
   * @var bool
   */
  protected bool $final = FALSE;

  /**
   * The parent structure.
   *
   * @var \Xylemical\Code\Definition\Structure|null
   */
  protected ?Structure $parent = NULL;

  /**
   * Structure constructor.
   *
   * @param string $name
   *   The name.
   */
  public function __construct(string $name) {
    $this->name = new FullyQualifiedName($name);
  }

  /**
   * Create a Structure.
   *
   * @param string $name
   *   The name.
   *
   * @return $this
   */
  public static function create(string $name): static {
    return ObjectManager::get(Structure::class, strtolower($name), new Structure($name));
  }

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
   * Get the structure parent.
   *
   * @return \Xylemical\Code\Definition\Structure|null
   *   The parent.
   */
  public function getParent(): ?Structure {
    return $this->parent;
  }

  /**
   * Check the structure has a parent.
   *
   * @return bool
   *   The result.
   */
  public function hasParent(): bool {
    return (bool) $this->parent;
  }

  /**
   * Set the parent structure.
   *
   * @param \Xylemical\Code\Definition\Structure $parent
   *   The parent structure.
   *
   * @return $this
   */
  public function setParent(Structure $parent): static {
    $this->parent = $parent;
    return $this;
  }

  /**
   * Remove the parent structure.
   *
   * @return $this
   */
  public function removeParent(): static {
    $this->parent = NULL;
    return $this;
  }

}

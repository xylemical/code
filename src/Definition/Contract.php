<?php

namespace Xylemical\Code\Definition;

use Xylemical\Code\DocumentationTrait;
use Xylemical\Code\FullyQualifiedName;
use Xylemical\Code\FullyQualifiedNameTrait;
use Xylemical\Code\ObjectManager;
use Xylemical\Code\VisibilityTrait;

/**
 * The equivalent of a PHP interface.
 */
class Contract implements StructureInterface {

  use ConstantTrait;
  use ContractTrait;
  use DocumentationTrait;
  use FullyQualifiedNameTrait;
  use MethodTrait;
  use VisibilityTrait;

  /**
   * Contract constructor.
   *
   * @param string $name
   *   The name.
   */
  public function __construct(string $name) {
    $this->name = new FullyQualifiedName($name);
  }

  /**
   * Create a Contract.
   *
   * @param string $name
   *   The name.
   *
   * @return $this
   */
  public static function create(string $name): static {
    return ObjectManager::get(Contract::class, strtolower($name), new Contract($name));
  }

}

<?php

declare(strict_types=1);

namespace Xylemical\Code\Definition;

use Xylemical\Code\DocumentationTrait;
use Xylemical\Code\FullyQualifiedName;
use Xylemical\Code\FullyQualifiedNamedInterface;
use Xylemical\Code\FullyQualifiedNameTrait;
use Xylemical\Code\ObjectManager;

/**
 * Provides a mixin definition.
 */
class Mixin implements StructureInterface, FullyQualifiedNamedInterface {

  use ConstantTrait;
  use MixinTrait;
  use DocumentationTrait;
  use FullyQualifiedNameTrait;
  use MethodTrait;
  use PropertyTrait;

  /**
   * Mixin constructor.
   *
   * @param string $name
   *   The name.
   */
  public function __construct(string $name) {
    $this->name = new FullyQualifiedName($name);
  }

  /**
   * Create a Mixin.
   *
   * @param string $name
   *   The name.
   *
   * @return $this
   */
  public static function create(string $name): static {
    return ObjectManager::get(Mixin::class, strtolower($name), new Mixin($name));
  }

}

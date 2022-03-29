<?php

namespace Xylemical\Code\Definition;

use Xylemical\Code\DefinitionInterface;
use Xylemical\Code\DocumentationTrait;
use Xylemical\Code\ExpressionInterface;
use Xylemical\Code\NamedInterface;
use Xylemical\Code\NameTrait;
use Xylemical\Code\ObjectManager;
use Xylemical\Code\ValueTrait;
use Xylemical\Code\VisibilityTrait;

/**
 * Provides a named constant value.
 */
class Constant implements DefinitionInterface, NamedInterface {

  use DocumentationTrait;
  use NameTrait;
  use ValueTrait;
  use VisibilityTrait;

  /**
   * ConstantDef constructor.
   *
   * @param string $name
   *   The name.
   * @param \Xylemical\Code\ExpressionInterface $value
   *   The value.
   */
  public function __construct(string $name, ExpressionInterface $value) {
    $this->name = $name;
    $this->value = $value;
  }

  /**
   * Create a ConstantDef.
   *
   * @param string $name
   *   The name.
   * @param \Xylemical\Code\ExpressionInterface $value
   *   The value.
   *
   * @return $this
   */
  public static function create(string $name, ExpressionInterface $value): static {
    return ObjectManager::get(Constant::class, strtolower($name), new Constant($name, $value));
  }

}

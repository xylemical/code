<?php

namespace Xylemical\Code\Definition;

use Xylemical\Code\DocumentationTrait;
use Xylemical\Code\NameTrait;
use Xylemical\Code\ObjectManager;
use Xylemical\Code\TypeTrait;
use Xylemical\Code\ValueTrait;
use Xylemical\Code\VisibilityTrait;

/**
 * Provides a method definition.
 */
class Method {

  use AbstractTrait;
  use DocumentationTrait;
  use NameTrait;
  use ParameterTrait;
  use TypeTrait;
  use ValueTrait;
  use VisibilityTrait;

  /**
   * Method constructor.
   *
   * @param string $name
   *   The name.
   */
  public function __construct(string $name) {
    $this->name = $name;
  }

  /**
   * Create a Method.
   *
   * @param string $name
   *   The name.
   *
   * @return $this
   */
  public static function create(string $name): static {
    return ObjectManager::get(Method::class, strtolower($name), new Method($name));
  }

}

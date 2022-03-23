<?php

namespace Xylemical\Code\Definition;

use Xylemical\Code\DefinitionInterface;
use Xylemical\Code\DocumentationTrait;
use Xylemical\Code\NameTrait;
use Xylemical\Code\ObjectManager;
use Xylemical\Code\TypeTrait;
use Xylemical\Code\ValueTrait;
use Xylemical\Code\VisibilityTrait;

/**
 * Provides a property definition.
 */
class Property implements DefinitionInterface {

  use DocumentationTrait;
  use NameTrait;
  use TypeTrait;
  use ValueTrait;
  use VisibilityTrait;

  /**
   * Property constructor.
   *
   * @param string $name
   *   The name.
   */
  public function __construct(string $name) {
    $this->name = $name;
  }

  /**
   * Create a Property.
   *
   * @param string $name
   *   The name.
   *
   * @return $this
   */
  public static function create(string $name): static {
    return ObjectManager::get(Property::class, strtolower($name), new Property($name));
  }

}

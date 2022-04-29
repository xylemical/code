<?php

declare(strict_types=1);

namespace Xylemical\Code\Definition;

use Xylemical\Code\DefinitionInterface;
use Xylemical\Code\DocumentationTrait;
use Xylemical\Code\NamedInterface;
use Xylemical\Code\NameTrait;
use Xylemical\Code\ObjectManager;
use Xylemical\Code\TypeTrait;
use Xylemical\Code\ValueTrait;

/**
 * Provides a parameter definition.
 */
class Parameter implements DefinitionInterface, NamedInterface {

  use DocumentationTrait;
  use NameTrait;
  use TypeTrait;
  use ValueTrait;

  /**
   * Parameter constructor.
   *
   * @param string $name
   *   The name.
   */
  public function __construct(string $name) {
    $this->name = $name;
  }

  /**
   * Create a Parameter.
   *
   * @param string $name
   *   The name.
   *
   * @return $this
   */
  public static function create(string $name): static {
    return ObjectManager::get(Parameter::class, strtolower($name), new Parameter($name));
  }

}

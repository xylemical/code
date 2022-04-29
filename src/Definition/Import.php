<?php

declare(strict_types=1);

namespace Xylemical\Code\Definition;

use Xylemical\Code\DefinitionInterface;
use Xylemical\Code\FullyQualifiedName;
use Xylemical\Code\ObjectManager;

/**
 * Defines an import for a file.
 */
class Import implements DefinitionInterface {

  /**
   * The name of the import.
   *
   * @var \Xylemical\Code\FullyQualifiedName
   */
  protected FullyQualifiedName $name;

  /**
   * Import constructor.
   *
   * @param \Xylemical\Code\FullyQualifiedName $name
   *   The import name.
   */
  public function __construct(FullyQualifiedName $name) {
    $this->name = $name;
  }

  /**
   * Get the import name.
   *
   * @return \Xylemical\Code\FullyQualifiedName
   *   The name.
   */
  public function getName(): FullyQualifiedName {
    return $this->name;
  }

  /**
   * Create an Import.
   *
   * @param string $name
   *   The name.
   *
   * @return $this
   */
  public static function create(string $name): static {
    return ObjectManager::get(Import::class, strtolower($name), new Import(FullyQualifiedName::create($name)));
  }

}

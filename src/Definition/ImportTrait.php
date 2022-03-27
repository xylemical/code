<?php

namespace Xylemical\Code\Definition;

/**
 * Extends definition with imports.
 */
trait ImportTrait {

  /**
   * The imports for this definition.
   *
   * @var \Xylemical\Code\Definition\Import[]
   */
  protected array $imports = [];

  /**
   * Set the imports for the definition.
   *
   * @param \Xylemical\Code\Definition\Import[] $imports
   *   The imports.
   *
   * @return $this
   */
  public function setImports(array $imports): static {
    $this->imports = [];
    $this->addImports($imports);
    return $this;
  }

  /**
   * Add the imports to the definition.
   *
   * @param \Xylemical\Code\Definition\Import[] $imports
   *   The imports.
   *
   * @return $this
   */
  public function addImports(array $imports): static {
    foreach ($imports as $import) {
      $this->addImport($import);
    }
    return $this;
  }

  /**
   * Add a import to the definition.
   *
   * @param \Xylemical\Code\Definition\Import $import
   *   The import.
   *
   * @return $this
   */
  public function addImport(Import $import): static {
    $name = strtolower($import->getName());
    if (!isset($this->imports[$name])) {
      $this->setImport($import);
    }
    return $this;
  }

  /**
   * Set an individual import.
   *
   * @param \Xylemical\Code\Definition\Import $import
   *   The import.
   *
   * @return $this
   */
  public function setImport(Import $import): static {
    $this->imports[strtolower($import->getName())] = $import;
    return $this;
  }

  /**
   * Get a import by name.
   *
   * @param string $name
   *   The import.
   *
   * @return \Xylemical\Code\Definition\Import|null
   *   The import.
   */
  public function getImport(string $name): ?Import {
    $name = strtolower($name);
    if (isset($this->imports[$name])) {
      return $this->imports[$name];
    }
    return NULL;
  }

  /**
   * Get all the imports.
   *
   * @return \Xylemical\Code\Definition\Import[]
   *   The imports.
   */
  public function getImports(): array {
    return array_values($this->imports);
  }

  /**
   * Remove a import from the definition.
   *
   * @param string $import
   *   The import.
   *
   * @return $this
   */
  public function removeImport(string $import): static {
    $import = strtolower($import);
    unset($this->imports[$import]);
    return $this;
  }

  /**
   *
   * Check there are imports defined.
   *
   * @return bool
   *   The result.
   */
  public function hasImports(): bool {
    return count($this->imports) > 0;
  }

}

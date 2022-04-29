<?php

declare(strict_types=1);

namespace Xylemical\Code;

/**
 * Provides simplified documentation accessors.
 */
trait DocumentationTrait {

  /**
   * The documentation of the definition.
   *
   * @var \Xylemical\Code\DocumentationInterface
   */
  protected DocumentationInterface $documentation;

  /**
   * Get the documentation of the definition.
   *
   * @return \Xylemical\Code\DocumentationInterface
   *   The documentation.
   */
  public function getDocumentation(): DocumentationInterface {
    if (!isset($this->documentation)) {
      $this->documentation = new Documentation();
    }
    return $this->documentation;
  }

  /**
   * Set the documentation of the definition.
   *
   * @param \Xylemical\Code\DocumentationInterface $documentation
   *   The documentation.
   *
   * @return $this
   */
  public function setDocumentation(DocumentationInterface $documentation): static {
    $this->documentation = $documentation;
    return $this;
  }

}

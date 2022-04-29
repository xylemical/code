<?php

declare(strict_types=1);

namespace Xylemical\Code;

/**
 * Provides generic documentation.
 */
class Documentation implements DocumentationInterface {

  /**
   * The contents.
   *
   * @var string
   */
  protected string $contents;

  /**
   * Documentation constructor.
   *
   * @param string $contents
   *   The contents.
   */
  public function __construct(string $contents = '') {
    $this->contents = $contents;
  }

  /**
   * {@inheritdoc}
   */
  public function getContents(): string {
    return $this->contents;
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty(): bool {
    return $this->contents === '';
  }

}

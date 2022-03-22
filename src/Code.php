<?php

namespace Xylemical\Code;

/**
 * Provide the definition for the code.
 */
class Code {

  /**
   * The code language.
   *
   * @var string
   */
  protected string $language;

  /**
   * The code contents.
   *
   * @var string
   */
  protected string $contents;

  /**
   * Code constructor.
   *
   * @param string $language
   *   The code language.
   * @param string $contents
   *   The code contents.
   */
  public function __construct(string $language, string $contents) {
    $this->language = $language;
    $this->contents = $contents;
  }

  /**
   * Get the code language.
   *
   * @return string
   *   The language.
   */
  public function getLanguage(): string {
    return $this->language;
  }

  /**
   * Set the code language.
   *
   * @param string $language
   *   The language.
   *
   * @return $this
   */
  public function setLanguage(string $language): static {
    $this->language = $language;
    return $this;
  }

  /**
   * Get the code contents.
   *
   * @return string
   *   The contents.
   */
  public function getContents(): string {
    return $this->contents;
  }

  /**
   * Set the code contents.
   *
   * @param string $contents
   *   The code contents.
   *
   * @return $this
   */
  public function setContents(string $contents): static {
    $this->contents = $contents;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function __toString(): string {
    return $this->contents;
  }

}

<?php

declare(strict_types=1);

namespace Xylemical\Code;

/**
 * Provides the language requirements.
 */
interface LanguageInterface {

  /**
   * Get the language name.
   *
   * @return string
   *   The language.
   */
  public function getName(): string;

  /**
   * Get the separator.
   *
   * @return string
   *   The separator.
   */
  public function getSeparator(): string;

  /**
   * Set the separator.
   *
   * @param string $separator
   *   The separator.
   *
   * @return $this
   */
  public function setSeparator(string $separator): static;

}

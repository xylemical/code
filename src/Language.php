<?php

declare(strict_types=1);

namespace Xylemical\Code;

/**
 * A generic language.
 */
class Language implements LanguageInterface {

  /**
   * The language name.
   *
   * @var string
   */
  protected string $name;

  /**
   * The language separator.
   *
   * @var string
   */
  protected string $separator;

  /**
   * Language constructor.
   *
   * @param string $name
   *   The name.
   * @param string $separator
   *   The separator.
   */
  public function __construct(string $name = 'php', string $separator = '\\') {
    $this->name = $name;
    $this->separator = $separator;
  }

  /**
   * {@inheritdoc}
   */
  public function getName(): string {
    return $this->name;
  }

  /**
   * {@inheritdoc}
   */
  public function getSeparator(): string {
    return $this->separator;
  }

  /**
   * {@inheritdoc}
   */
  public function setSeparator(string $separator): static {
    $this->separator = $separator;
    return $this;
  }

}

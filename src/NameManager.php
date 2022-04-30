<?php

declare(strict_types=1);

namespace Xylemical\Code;

/**
 * Provides names within a self-contained unit.
 */
final class NameManager {

  /**
   * The language used for names.
   *
   * @var \Xylemical\Code\LanguageInterface
   */
  protected LanguageInterface $language;

  /**
   * The names.
   *
   * @var \Xylemical\Code\FullyQualifiedName[]
   */
  protected array $names = [];

  /**
   * NameManager constructor.
   *
   * @param \Xylemical\Code\LanguageInterface $language
   *   The language.
   */
  public function __construct(LanguageInterface $language) {
    $this->language = $language;
  }

  /**
   * Get the language.
   *
   * @return \Xylemical\Code\LanguageInterface
   *   The language.
   */
  public function getLanguage(): LanguageInterface {
    return $this->language;
  }

  /**
   * Get a fully qualified name.
   *
   * @param string $name
   *   The name.
   *
   * @return \Xylemical\Code\FullyQualifiedName
   *   The name.
   */
  public function get(string $name): FullyQualifiedName {
    if (isset($this->names[$name])) {
      return $this->names[$name];
    }
    $this->names[$name] = new FullyQualifiedName($name, $this);
    return $this->names[$name];
  }

  /**
   * Get the common fully qualified name.
   *
   * @param \Xylemical\Code\FullyQualifiedName $name
   *   The name.
   *
   * @return \Xylemical\Code\FullyQualifiedName
   *   The name.
   */
  public function getName(FullyQualifiedName $name): FullyQualifiedName {
    $target = (string) $name;
    if (isset($this->names[$target]) && $this->names[$target] === $name) {
      return $name;
    }
    return $this->get($target);
  }

  /**
   * Get the fully qualified names.
   *
   * @return \Xylemical\Code\FullyQualifiedName[]
   *   The names.
   */
  public function all(): array {
    return array_values($this->names);
  }

}

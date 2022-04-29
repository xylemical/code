<?php

declare(strict_types=1);

namespace Xylemical\Code;

/**
 * Provides a fully qualified namespaced name.
 */
class FullyQualifiedName {

  /**
   * The separator used for fully qualified names.
   *
   * @var string
   */
  protected static string $separator = '\\';

  /**
   * The parts of the name.
   *
   * @var string[]
   */
  protected array $parts;

  /**
   * Get the shorthand name if specified.
   *
   * @var string
   */
  protected string $shorthand = '';

  /**
   * FullyQualifiedName constructor.
   *
   * @param string $name
   *   The fully qualified name.
   */
  public function __construct(string $name) {
    $separator = self::getSeparator() ?: '\\';
    $this->parts = explode($separator, ltrim($name, $separator));
  }

  /**
   * Get the namespace part of the name.
   *
   * @return string[]
   *   The namespace parts.
   */
  public function getNamespace(): array {
    return array_slice($this->parts, 0, -1);
  }

  /**
   * Get the normalized name.
   *
   * @return string
   *   The name.
   */
  public function getName(): string {
    $count = count($this->parts);
    return $count > 0 ? $this->parts[$count - 1] : '';
  }

  /**
   * Get the full name.
   *
   * @return string[]
   *   The name.
   */
  public function getFullName(): array {
    return $this->parts;
  }

  /**
   * Set the shorthand name for the name.
   *
   * @param string $shorthand
   *   The shorthand name used.
   *
   * @return $this
   */
  public function setShorthand(string $shorthand): static {
    $this->shorthand = $shorthand;
    return $this;
  }

  /**
   * Check the name has a shorthand version.
   *
   * @return bool
   *   The result.
   */
  public function hasShorthand(): bool {
    return $this->getShorthand() !== $this->getName();
  }

  /**
   * Get the shorthand name used for the name.
   *
   * @return string
   *   The shorthand name.
   */
  public function getShorthand(): string {
    return $this->shorthand ?: $this->getName();
  }

  /**
   * Check that this name equals a $name.
   *
   * @param \Xylemical\Code\FullyQualifiedName $name
   *   The name.
   *
   * @return bool
   *   The result.
   */
  public function equals(FullyQualifiedName $name): bool {
    return (string) $name === (string) $this;
  }

  /**
   * Convert name into string.
   *
   * @return string
   *   The name.
   */
  public function __toString() {
    return implode(self::getSeparator(), $this->getFullName());
  }

  /**
   * Set the separator used for fully qualified names.
   *
   * @param string $separator
   *   The separator.
   */
  public static function setSeparator(string $separator): void {
    self::$separator = $separator;
  }

  /**
   * Get the separator used for fully qualified names.
   *
   * @return string
   *   The separator.
   */
  public static function getSeparator(): string {
    return self::$separator;
  }

  /**
   * Create a FullyQualifiedName.
   *
   * @param string $name
   *   The name.
   *
   * @return $this
   */
  public static function create(string $name): static {
    return ObjectManager::get(FullyQualifiedName::class, strtolower($name), new FullyQualifiedName($name));
  }

}

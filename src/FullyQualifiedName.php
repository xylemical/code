<?php

declare(strict_types=1);

namespace Xylemical\Code;

/**
 * Provides a fully qualified namespaced name.
 */
class FullyQualifiedName implements \Stringable {

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
   * The language.
   *
   * @var \Xylemical\Code\NameManager
   */
  protected NameManager $manager;

  /**
   * FullyQualifiedName constructor.
   *
   * @param string $name
   *   The fully qualified name.
   * @param \Xylemical\Code\NameManager $manager
   *   The manager.
   */
  public function __construct(string $name, NameManager $manager) {
    $this->manager = $manager;
    $separator = $manager->getLanguage()->getSeparator() ?: '\\';
    $this->parts = explode($separator, ltrim($name, $separator));
  }

  /**
   * Convert the parts into the properly namespaced items.
   *
   * @param string[] $parts
   *   The parts.
   *
   * @return string
   *   The result.
   */
  protected function doSeparator(array $parts): string {
    return implode($this->getSeparator(), $parts);
  }

  /**
   * Get the namespace part of the name.
   *
   * @return string
   *   The namespace.
   */
  public function getNamespace(): string {
    return $this->doSeparator(array_slice($this->parts, 0, -1));
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
   * @return string
   *   The name.
   */
  public function getFullName(): string {
    return $this->doSeparator($this->parts);
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
   * Get the language.
   *
   * @return \Xylemical\Code\LanguageInterface
   *   The language.
   */
  public function getLanguage(): LanguageInterface {
    return $this->manager->getLanguage();
  }

  /**
   * Get the namespace separator.
   *
   * @return string
   *   The separator.
   */
  public function getSeparator(): string {
    return $this->manager->getLanguage()->getSeparator();
  }

  /**
   * {@inheritdoc}
   */
  public function __toString() {
    return $this->getFullName();
  }

  /**
   * Create a FullyQualifiedName.
   *
   * @param string $name
   *   The name.
   * @param \Xylemical\Code\NameManager $manager
   *   The name manager.
   *
   * @return \Xylemical\Code\FullyQualifiedName
   *   The common name.
   */
  public static function create(string $name, NameManager $manager): FullyQualifiedName {
    return $manager->get($name);
  }

}

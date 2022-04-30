<?php

declare(strict_types=1);

namespace Xylemical\Code\Definition;

use Xylemical\Code\Documentation;
use Xylemical\Code\DocumentationInterface;
use Xylemical\Code\ExpressionInterface;
use Xylemical\Code\FullyQualifiedName;
use Xylemical\Code\NameManager;
use Xylemical\Code\Visibility;

/**
 * Provides a base element for structures.
 */
abstract class AbstractElement implements ElementInterface {

  /**
   * The name manager.
   *
   * @var \Xylemical\Code\NameManager
   */
  protected NameManager $manager;

  /**
   * The name.
   *
   * @var string
   */
  protected string $name;

  /**
   * The visibility.
   *
   * @var \Xylemical\Code\Visibility
   */
  protected Visibility $visibility;

  /**
   * The documentation.
   *
   * @var \Xylemical\Code\DocumentationInterface
   */
  protected DocumentationInterface $documentation;

  /**
   * The element is considered final.
   *
   * @var bool
   */
  protected bool $final = FALSE;

  /**
   * The element is considered abstract.
   *
   * @var bool
   */
  protected bool $abstract = FALSE;

  /**
   * The element is considered static.
   *
   * @var bool
   */
  protected bool $static = FALSE;

  /**
   * The type of the element.
   *
   * @var \Xylemical\Code\FullyQualifiedName|null
   */
  protected ?FullyQualifiedName $type = NULL;

  /**
   * The value of the element.
   *
   * @var \Xylemical\Code\ExpressionInterface|null
   */
  protected ?ExpressionInterface $value = NULL;

  /**
   * AbstractElement constructor.
   *
   * @param string $name
   *   The name.
   * @param \Xylemical\Code\NameManager $manager
   *   The name manager.
   */
  final public function __construct(string $name, NameManager $manager) {
    $this->name = $name;
    $this->manager = $manager;
    $this->visibility = new Visibility();
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
  public function setName(string $name): static {
    $this->name = $name;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getDocumentation(): DocumentationInterface {
    if (!isset($this->documentation)) {
      $this->documentation = new Documentation();
    }
    return $this->documentation;
  }

  /**
   * {@inheritdoc}
   */
  public function setDocumentation(DocumentationInterface $documentation): static {
    $this->documentation = $documentation;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getVisibility(): Visibility {
    return $this->visibility;
  }

  /**
   * {@inheritdoc}
   */
  public function setVisibility(int $visibility): static {
    match ($visibility) {
      Visibility::PRIVATE => $this->visibility->setPrivate(),
      Visibility::PROTECTED => $this->visibility->setProtected(),
      default => $this->visibility->setPublic(),
    };
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function isFinal(): bool {
    return $this->final;
  }

  /**
   * {@inheritdoc}
   */
  public function setFinal(bool $flag): static {
    $this->final = $flag;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function isAbstract(): bool {
    return $this->abstract;
  }

  /**
   * {@inheritdoc}
   */
  public function setAbstract(bool $flag): static {
    $this->abstract = $flag;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function isStatic(): bool {
    return $this->static;
  }

  /**
   * {@inheritdoc}
   */
  public function setStatic(bool $flag): static {
    $this->static = $flag;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getType(): ?FullyQualifiedName {
    return $this->type;
  }

  /**
   * {@inheritdoc}
   */
  public function setType(string $name): static {
    $this->type = $name ? $this->manager->get($name) : NULL;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getValue(): ?ExpressionInterface {
    return $this->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setValue(?ExpressionInterface $expression): static {
    $this->value = $expression;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function __toString(): string {
    return $this->name;
  }

  /**
   * Create an element.
   *
   * @param string $name
   *   The name.
   * @param \Xylemical\Code\NameManager $manager
   *   The name manager.
   *
   * @return \Xylemical\Code\Definition\AbstractElement
   *   The element.
   */
  final public static function create(string $name, NameManager $manager): AbstractElement {
    return new static($name, $manager);
  }

}

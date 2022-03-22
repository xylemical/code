<?php

namespace Xylemical\Code;

/**
 * Provides visibility to the various definitions.
 */
class Visibility {

  /**
   * Indicates the definition is publicly visible.
   */
  const PUBLIC = 0;

  /**
   * Indicates the definition is protected within scope.
   */
  const PROTECTED = 1;

  /**
   * Indicates the definition is private within scope.
   */
  const PRIVATE = 2;

  /**
   * The visibility level.
   *
   * @var int
   */
  protected int $visibility;

  /**
   * Visibility constructor.
   *
   * @param int $visibility
   *   The visibility.
   */
  public function __construct(int $visibility = Visibility::PUBLIC) {
    $this->visibility = $visibility;
  }

  /**
   * Set the visibility to public.
   *
   * @return $this
   */
  public function setPublic(): static {
    $this->visibility = Visibility::PUBLIC;
    return $this;
  }

  /**
   * Set the visibility to protected.
   *
   * @return $this
   */
  public function setProtected(): static {
    $this->visibility = Visibility::PROTECTED;
    return $this;
  }

  /**
   * Set the visibility to private.
   *
   * @return $this
   */
  public function setPrivate(): static {
    $this->visibility = Visibility::PRIVATE;
    return $this;
  }

  /**
   * Get the visibility.
   *
   * @return int
   *   The visibility level.
   */
  public function getVisibility(): int {
    return $this->visibility;
  }

  /**
   * Check the visibility within a scope.
   *
   * @param int $scope
   *   The scope.
   *
   * @return bool
   *   The result.
   */
  public function isVisible(int $scope): bool {
    return $this->visibility <= $scope && $scope >= Visibility::PUBLIC;
  }

}

<?php

declare(strict_types=1);

namespace Xylemical\Code;

/**
 * Provides visibility on an object.
 */
trait VisibilityTrait {

  /**
   * The visibility of the object.
   *
   * @var \Xylemical\Code\Visibility
   */
  protected Visibility $visibility;

  /**
   * Get the visibility.
   *
   * @return \Xylemical\Code\Visibility
   *   The visibility.
   */
  public function getVisibility(): Visibility {
    if (!isset($this->visibility)) {
      $this->visibility = new Visibility();
    }
    return $this->visibility;
  }

  /**
   * Set the visibility for the object.
   *
   * @param int $visibility
   *   The visibility.
   *
   * @return $this
   */
  public function setVisibility(int $visibility): static {
    switch ($visibility) {
      case Visibility::PRIVATE:
        $this->getVisibility()->setPrivate();
        break;

      case Visibility::PROTECTED:
        $this->getVisibility()->setProtected();
        break;

      default:
        $this->getVisibility()->setPublic();
    }
    return $this;
  }

}

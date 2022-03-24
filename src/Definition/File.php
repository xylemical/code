<?php

namespace Xylemical\Code\Definition;

use Xylemical\Code\DefinitionInterface;
use Xylemical\Code\ObjectManager;

/**
 * Provides structure as part of the file.
 */
class File implements DefinitionInterface {

  use StructureTrait;
  use ImportTrait;

  /**
   * The filename.
   *
   * @var string
   */
  protected string $filename;

  /**
   * File constructor.
   *
   * @param string $filename
   *   The filename.
   */
  public function __construct(string $filename) {
    $this->filename = $filename;
  }

  /**
   * Get the filename of the file.
   *
   * @return string
   *   The filename.
   */
  public function getFilename(): string {
    return $this->filename;
  }

  /**
   * Set the filename of the file.
   *
   * @param string $filename
   *   The filename.
   *
   * @return $this
   */
  public function setFilename(string $filename): static {
    $this->filename = $filename;
    return $this;
  }

  /**
   * Create a File.
   *
   * @param string $filename
   *   The filename.
   *
   * @return $this
   */
  public static function create(string $filename): static {
    return ObjectManager::get(File::class, strtolower($filename), new File($filename));
  }

}

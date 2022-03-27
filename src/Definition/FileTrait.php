<?php

namespace Xylemical\Code\Definition;

/**
 * Extends definition with files.
 */
trait FileTrait {

  /**
   * The files for this definition.
   *
   * @var \Xylemical\Code\Definition\File[]
   */
  protected array $files = [];

  /**
   * Set the files for the definition.
   *
   * @param \Xylemical\Code\Definition\File[] $files
   *   The files.
   *
   * @return $this
   */
  public function setFiles(array $files): static {
    $this->files = [];
    $this->addFiles($files);
    return $this;
  }

  /**
   * Add the files to the definition.
   *
   * @param \Xylemical\Code\Definition\File[] $files
   *   The files.
   *
   * @return $this
   */
  public function addFiles(array $files): static {
    foreach ($files as $file) {
      $this->addFile($file);
    }
    return $this;
  }

  /**
   * Add a file to the definition.
   *
   * @param \Xylemical\Code\Definition\File $file
   *   The file.
   *
   * @return $this
   */
  public function addFile(File $file): static {
    $name = strtolower($file->getFilename());
    if (!isset($this->files[$name])) {
      $this->setFile($file);
    }
    return $this;
  }

  /**
   * Set an individual file.
   *
   * @param \Xylemical\Code\Definition\File $file
   *   The file.
   *
   * @return $this
   */
  public function setFile(File $file): static {
    $this->files[strtolower($file->getFilename())] = $file;
    return $this;
  }

  /**
   * Get a file by name.
   *
   * @param string $name
   *   The file.
   *
   * @return \Xylemical\Code\Definition\File|null
   *   The file.
   */
  public function getFile(string $name): ?File {
    $name = strtolower($name);
    if (isset($this->files[$name])) {
      return $this->files[$name];
    }
    return NULL;
  }

  /**
   * Get all the files.
   *
   * @return \Xylemical\Code\Definition\File[]
   *   The files.
   */
  public function getFiles(): array {
    return array_values($this->files);
  }

  /**
   * Remove a file from the definition.
   *
   * @param string $file
   *   The file.
   *
   * @return $this
   */
  public function removeFile(string $file): static {
    $file = strtolower($file);
    unset($this->files[$file]);
    return $this;
  }

  /**
   * Check there are files defined.
   *
   * @return bool
   *   The result.
   */
  public function hasFiles(): bool {
    return count($this->files) > 0;
  }

}

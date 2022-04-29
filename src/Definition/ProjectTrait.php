<?php

declare(strict_types=1);

namespace Xylemical\Code\Definition;

/**
 * Extends definition with projects.
 */
trait ProjectTrait {

  /**
   * The projects for this definition.
   *
   * @var \Xylemical\Code\Definition\Project[]
   */
  protected array $projects = [];

  /**
   * Set the projects for the definition.
   *
   * @param \Xylemical\Code\Definition\Project[] $projects
   *   The projects.
   *
   * @return $this
   */
  public function setProjects(array $projects): static {
    $this->projects = [];
    $this->addProjects($projects);
    return $this;
  }

  /**
   * Add the projects to the definition.
   *
   * @param \Xylemical\Code\Definition\Project[] $projects
   *   The projects.
   *
   * @return $this
   */
  public function addProjects(array $projects): static {
    foreach ($projects as $project) {
      $this->addProject($project);
    }
    return $this;
  }

  /**
   * Add a project to the definition.
   *
   * @param \Xylemical\Code\Definition\Project $project
   *   The project.
   *
   * @return $this
   */
  public function addProject(Project $project): static {
    $name = strtolower($project->getName());
    if (!isset($this->projects[$name])) {
      $this->setProject($project);
    }
    return $this;
  }

  /**
   * Set an individual project.
   *
   * @param \Xylemical\Code\Definition\Project $project
   *   The project.
   *
   * @return $this
   */
  public function setProject(Project $project): static {
    $this->projects[strtolower($project->getName())] = $project;
    return $this;
  }

  /**
   * Get a project by name.
   *
   * @param string $name
   *   The project.
   *
   * @return \Xylemical\Code\Definition\Project|null
   *   The project.
   */
  public function getProject(string $name): ?Project {
    $name = strtolower($name);
    if (isset($this->projects[$name])) {
      return $this->projects[$name];
    }
    return NULL;
  }

  /**
   * Get all the projects.
   *
   * @return \Xylemical\Code\Definition\Project[]
   *   The projects.
   */
  public function getProjects(): array {
    return array_values($this->projects);
  }

  /**
   * Remove a project from the definition.
   *
   * @param string $project
   *   The project.
   *
   * @return $this
   */
  public function removeProject(string $project): static {
    $project = strtolower($project);
    unset($this->projects[$project]);
    return $this;
  }

  /**
   * Check there are projects defined.
   *
   * @return bool
   *   The result.
   */
  public function hasProjects(): bool {
    return count($this->projects) > 0;
  }

}

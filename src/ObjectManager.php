<?php

namespace Xylemical\Code;

/**
 * Provides a manager for providing singleton objects.
 */
class ObjectManager {

  /**
   * The object cache.
   *
   * @var array[]
   */
  private static array $objects = [];

  /**
   * Reset the manager.
   *
   * @param string $target
   *   The target, leave empty to reset everything.
   */
  public static function reset(string $target = ''): void {
    if ($target) {
      unset(self::$objects[$target]);
    }
    else {
      self::$objects = [];
    }
  }

  /**
   * Get the common object based on the target behaviour.
   *
   * @param string $target
   *   The target class.
   * @param string $name
   *   The name used for the target.
   * @param mixed $object
   *   The object it represents.
   *
   * @return mixed
   *   The common object based on name.
   */
  public static function get(string $target, string $name, mixed $object): mixed {
    if (isset(self::$objects[$target][$name])) {
      return self::$objects[$target][$name];
    }
    self::$objects[$target][$name] = $object;
    return $object;
  }

}

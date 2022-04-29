<?php

declare(strict_types=1);

namespace Xylemical\Code\Util;

/**
 * Provide indentation helpers.
 */
class Indenter {

  /**
   * Perform an indentation.
   *
   * @param string $text
   *   The text to indent.
   * @param int $spaces
   *   The number of spaces per level.
   * @param int $levels
   *   The number of levels.
   *
   * @return string
   *   The indented text.
   */
  public static function indent(string $text, int $spaces = 2, int $levels = 1): string {
    $result = '';
    $indent = str_repeat(' ', $levels * $spaces);

    // Process each of the lines using all different line endings.
    $lines = preg_split('/(\r\n|\n|\r)/', $text, -1, PREG_SPLIT_DELIM_CAPTURE);
    foreach ($lines as $index => $line) {
      if (!preg_match('/^(\r\n|\n|\r)$/', $line)) {
        if (trim($line)) {
          $result .= $indent . $line;
        }
      }
      else {
        $result .= $line;
      }
    }
    return $result;
  }

  /**
   * Perform an outdentation.
   *
   * @param string $text
   *   The text to outdent.
   * @param int $spaces
   *   The number of spaces per level.
   * @param int $levels
   *   The number of levels.
   *
   * @return string
   *   The outdented text.
   */
  public static function outdent(string $text, int $spaces = 2, int $levels = 1): string {
    $result = '';
    $dedent = $levels * $spaces;
    $pattern = '/^[ ]{1,' . $dedent . '}/';

    // Process each of the lines using all different line endings.
    $lines = preg_split('/(\r\n|\n|\r)/', $text, -1, PREG_SPLIT_DELIM_CAPTURE);
    foreach ($lines as $index => $line) {
      if (!preg_match('/^(\r\n|\n|\r)$/', $line)) {
        if (trim($line)) {
          $result .= preg_replace($pattern, '', $line);
        }
      }
      else {
        $result .= $line;
      }
    }
    return $result;
  }

  /**
   * Removes indentation from first line only.
   *
   * @param string $text
   *   The text to defix.
   * @param int $spaces
   *   The number of spaces per level.
   * @param int $levels
   *   The number of levels to defix.
   *
   * @return string
   *   The defixed text.
   */
  public static function defix(string $text, int $spaces = 2, int $levels = 1): string {
    $dedent = $levels * $spaces;
    $pattern = '/^[ ]{1,' . $dedent . '}/';
    return preg_replace($pattern, '', $text);
  }

}

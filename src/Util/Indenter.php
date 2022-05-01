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
   * @param array $options
   *   The options:
   *      'spaces' - spaces per level - defaults to 2.
   *      'levels' - number of levels - defaults to 1.
   *      'ignoreFirst' - ignores indent on first line - defaults to FALSE.
   *
   * @return string
   *   The indented text.
   */
  public static function indent(string $text, array $options): string {
    $result = '';
    $spaces = intval($options['spaces'] ?? 2);
    $levels = intval($options['levels'] ?? 1);
    $ignoreFirst = boolval($options['ignoreFirst'] ?? FALSE);

    $indent = str_repeat(' ', $levels * $spaces);

    // Process each of the lines using all different line endings.
    $lines = preg_split('/(\r\n|\n|\r)/', $text, -1, PREG_SPLIT_DELIM_CAPTURE);
    foreach ($lines as $index => $line) {
      if (!preg_match('/^(\r\n|\n|\r)$/', $line)) {
        if (trim($line)) {
          $result .= (!$index && $ignoreFirst ? '' : $indent) . $line;
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
   * @param array $options
   *   The options:
   *      'spaces' - spaces per level - defaults to 2.
   *      'levels' - number of levels - defaults to 1.
   *      'ignoreFirst' - ignores indent on first line - defaults to FALSE.
   *
   * @return string
   *   The outdented text.
   */
  public static function outdent(string $text, array $options): string {
    $result = '';
    $spaces = intval($options['spaces'] ?? 2);
    $levels = intval($options['levels'] ?? 1);
    $ignoreFirst = boolval($options['ignoreFirst'] ?? FALSE);

    $dedent = $levels * $spaces;
    $pattern = '/^[ ]{1,' . $dedent . '}/';

    // Process each of the lines using all different line endings.
    $lines = preg_split('/(\r\n|\n|\r)/', $text, -1, PREG_SPLIT_DELIM_CAPTURE);
    foreach ($lines as $index => $line) {
      if (!preg_match('/^(\r\n|\n|\r)$/', $line)) {
        if (trim($line)) {
          if (!$index && $ignoreFirst) {
            $result .= $line;
          }
          else {
            $result .= preg_replace($pattern, '', $line);
          }
        }
      }
      else {
        $result .= $line;
      }
    }
    return $result;
  }

}

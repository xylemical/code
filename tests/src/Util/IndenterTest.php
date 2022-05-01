<?php

declare(strict_types=1);

namespace Xylemical\Code\Util;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Code\Util\Indenter.
 */
class IndenterTest extends TestCase {

  /**
   * Provides test data for testIndent().
   *
   * @return array
   *   The test data.
   */
  public function providerTestIndent(): array {
    return [
      ["a", "  a", ['spaces' => 2, 'levels' => 1, 'ignoreFirst' => FALSE]],
      ["a", " a", ['spaces' => 1]],
      ["a", "      a", ['spaces' => 2, 'levels' => 3]],
      ["a\nb", "  a\n  b", []],
      ["a\nb\n", "  a\n  b\n", []],
      ["a\nb", " a\n b", ['spaces' => 1]],
      ["a\nb\n", " a\n b\n", ['spaces' => 1]],
      ["a\nb", "      a\n      b", ['spaces' => 2, 'levels' => 3]],
      ["a\nb\n", "      a\n      b\n", ['spaces' => 2, 'levels' => 3]],
      [" a\nb", "  a\n b", ['spaces' => 1]],
      [" a\nb\n", "  a\n b\n", ['spaces' => 1]],
      [" a\nb", "       a\n      b", ['spaces' => 2, 'levels' => 3]],
      [" a\nb\n", "       a\n      b\n", ['spaces' => 2, 'levels' => 3]],
      ["a", "a", ['spaces' => 2, 'levels' => 1, 'ignoreFirst' => TRUE]],
      ["a", "a", ['spaces' => 1, 'ignoreFirst' => TRUE]],
      ["a", "a", ['spaces' => 2, 'levels' => 3, 'ignoreFirst' => TRUE]],
      ["a\nb", "a\n  b", ['ignoreFirst' => TRUE]],
      ["a\nb\n", "a\n  b\n", ['ignoreFirst' => TRUE]],
      ["a\nb", "a\n b", ['spaces' => 1, 'ignoreFirst' => TRUE]],
      ["a\nb\n", "a\n b\n", ['spaces' => 1, 'ignoreFirst' => TRUE]],
      [
        "a\nb",
        "a\n      b",
        ['spaces' => 2, 'levels' => 3, 'ignoreFirst' => TRUE],
      ],
      [
        "a\nb\n",
        "a\n      b\n",
        ['spaces' => 2, 'levels' => 3, 'ignoreFirst' => TRUE],
      ],
      [" a\nb", " a\n b", ['spaces' => 1, 'ignoreFirst' => TRUE]],
      [" a\nb\n", " a\n b\n", ['spaces' => 1, 'ignoreFirst' => TRUE]],
      [
        " a\nb",
        " a\n      b",
        ['spaces' => 2, 'levels' => 3, 'ignoreFirst' => TRUE],
      ],
      [
        " a\nb\n",
        " a\n      b\n",
        ['spaces' => 2, 'levels' => 3, 'ignoreFirst' => TRUE],
      ],
    ];
  }

  /**
   * Tests the indentation process.
   *
   * @dataProvider providerTestIndent
   */
  public function testIndent(string $text, string $expected, array $options): void {
    $this->assertEquals($expected, Indenter::indent($text, $options));
  }

  /**
   * Provides test data for testOutdent().
   *
   * @return array
   *   The test data.
   */
  public function providerTestOutdent(): array {
    return [
      ["  a", "a", ['spaces' => 2, 'levels' => 1, 'ignoreFirst' => FALSE]],
      ["  a", " a", ['spaces' => 1]],
      ["  a", "a", ['spaces' => 2, 'levels' => 3]],
      ["  a\n  b", "a\nb", []],
      ["  a\n  b", " a\n b", ['spaces' => 1]],
      ["  a\n  b", "a\nb", ['spaces' => 2, 'levels' => 3]],
      ["  a\n  b\n", "a\nb\n", []],
      ["  a\n  b\n", " a\n b\n", ['spaces' => 1]],
      ["  a\n  b\n", "a\nb\n", ['spaces' => 2, 'levels' => 3]],
      ["  a", "  a", ['spaces' => 2, 'levels' => 1, 'ignoreFirst' => TRUE]],
      ["  a", "  a", ['spaces' => 1, 'ignoreFirst' => TRUE]],
      ["  a", "  a", ['spaces' => 2, 'levels' => 3, 'ignoreFirst' => TRUE]],
      ["  a\n  b", "  a\nb", ['ignoreFirst' => TRUE]],
      ["  a\n  b", "  a\n b", ['spaces' => 1, 'ignoreFirst' => TRUE]],
      [
        "  a\n  b",
        "  a\nb",
        ['spaces' => 2, 'levels' => 3, 'ignoreFirst' => TRUE],
      ],
      ["  a\n  b\n", "  a\nb\n", ['ignoreFirst' => TRUE]],
      ["  a\n  b\n", "  a\n b\n", ['spaces' => 1, 'ignoreFirst' => TRUE]],
      [
        "  a\n  b\n",
        "  a\nb\n",
        ['spaces' => 2, 'levels' => 3, 'ignoreFirst' => TRUE],
      ],
    ];
  }

  /**
   * Test the outdentation process.
   *
   * @dataProvider providerTestOutdent
   */
  public function testOutdent(string $text, string $expected, array $options): void {
    $this->assertEquals($expected, Indenter::outdent($text, $options));
  }

}

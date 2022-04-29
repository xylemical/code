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
      ["a", "  a"],
      ["a", " a", 1],
      ["a", "      a", 2, 3],
      ["a\nb", "  a\n  b"],
      ["a\nb\n", "  a\n  b\n"],
      ["a\nb", " a\n b", 1],
      ["a\nb\n", " a\n b\n", 1],
      ["a\nb", "      a\n      b", 2, 3],
      ["a\nb\n", "      a\n      b\n", 2, 3],
      [" a\nb", "  a\n b", 1],
      [" a\nb\n", "  a\n b\n", 1],
      [" a\nb", "       a\n      b", 2, 3],
      [" a\nb\n", "       a\n      b\n", 2, 3],
    ];
  }

  /**
   * Tests the indentation process.
   *
   * @dataProvider providerTestIndent
   */
  public function testIndent(string $text, string $expected, int $spaces = 2, int $levels = 1): void {
    $this->assertEquals($expected, Indenter::indent($text, $spaces, $levels));
  }

  /**
   * Provides test data for testOutdent().
   *
   * @return array
   *   The test data.
   */
  public function providerTestOutdent(): array {
    return [
      ["  a", "a"],
      ["  a", " a", 1],
      ["  a", "a", 2, 3],
      ["  a\n  b", "a\nb"],
      ["  a\n  b", " a\n b", 1],
      ["  a\n  b", "a\nb", 2, 3],
      ["  a\n  b\n", "a\nb\n"],
      ["  a\n  b\n", " a\n b\n", 1],
      ["  a\n  b\n", "a\nb\n", 2, 3],
    ];
  }

  /**
   * Test the outdentation process.
   *
   * @dataProvider providerTestOutdent
   */
  public function testOutdent(string $text, string $expected, int $spaces = 2, int $levels = 1): void {
    $this->assertEquals($expected, Indenter::outdent($text, $spaces, $levels));
  }

  /**
   * Provides test data for the defix process.
   *
   * @return array
   *   The test data.
   */
  public function providerTestDefix(): array {
    return [
      ["  a", "a"],
      ["  a", " a", 1],
      ["  a", "a", 2, 3],
      ["  a\n  b", "a\n  b"],
      ["  a\n  b", " a\n  b", 1],
      ["  a\n  b", "a\n  b", 2, 3],
      ["  a\n  b\n", "a\n  b\n"],
      ["  a\n  b\n", " a\n  b\n", 1],
      ["  a\n  b\n", "a\n  b\n", 2, 3],
    ];
  }

  /**
   * Tests the defix process.
   *
   * @dataProvider providerTestDefix
   */
  public function testDefix(string $text, string $expected, int $spaces = 2, int $levels = 1): void {
    $this->assertEquals($expected, Indenter::defix($text, $spaces, $levels));
  }

}

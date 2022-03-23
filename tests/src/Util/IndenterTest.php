<?php

namespace Xylemical\Code\Util;

use PHPUnit\Framework\TestCase;

class IndenterTest extends TestCase {

  public function providerTestIndent() {
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
   * @dataProvider providerTestIndent
   */
  public function testIndent($text, $expected, $spaces = 2, $levels = 1) {
    $this->assertEquals($expected, Indenter::indent($text, $spaces, $levels));
  }

  public function providerTestOutdent() {
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
   * @dataProvider providerTestOutdent
   */
  public function testOutdent($text, $expected, $spaces = 2, $levels = 1) {
    $this->assertEquals($expected, Indenter::outdent($text, $spaces, $levels));
  }

  public function providerTestDefix() {
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
   * @dataProvider providerTestDefix
   */
  public function testDefix($text, $expected, $spaces = 2, $levels = 1) {
    $this->assertEquals($expected, Indenter::defix($text, $spaces, $levels));
  }

}

<?php

declare(strict_types=1);

namespace Xylemical\Code;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Code\Language.
 */
class LanguageTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testSanity(): void {
    $language = new Language('c++', '::');
    $this->assertEquals('c++', $language->getName());
    $this->assertEquals('::', $language->getSeparator());

    $language->setSeparator('+');
    $this->assertEquals('+', $language->getSeparator());
  }

}

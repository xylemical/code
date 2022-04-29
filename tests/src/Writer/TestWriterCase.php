<?php

declare(strict_types=1);

namespace Xylemical\Code\Writer;

use PHPUnit\Framework\TestCase;

/**
 * Provides test case for writers.
 */
class TestWriterCase extends TestCase {

  /**
   * Get the sources used for the test case.
   *
   * @param string $fixturePath
   *   The fixture location.
   *
   * @return array
   *   The test data.
   */
  protected function getSources(string $fixturePath): array {
    $tests = [];

    $path = realpath(__DIR__ . '/../../fixtures/sources');
    foreach (glob("{$path}/*.inc") as $source) {
      $filename = basename($source, '.inc');
      if (file_exists("{$fixturePath}/{$filename}.txt")) {
        $tests[$source] = "{$fixturePath}/{$filename}.txt";
      }
    }

    return $tests;
  }

}

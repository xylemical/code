<?php

namespace Xylemical\Code\Writer;

use PHPUnit\Framework\TestCase;

class TestWriterCase extends TestCase {

  protected function getSources(string $fixturePath) {
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

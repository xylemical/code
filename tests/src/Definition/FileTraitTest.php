<?php

declare(strict_types=1);

namespace Xylemical\Code\Definition;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Code\Definition\FileTrait.
 */
class FileTraitTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testFile(): void {
    $obj = $this->getObjectForTrait(FileTrait::class);

    $this->assertNull($obj->getFile('test'));
    $this->assertFalse($obj->hasFiles());

    $a = new File('Test\\Trait');
    $b = new File('Test\\Sequence');

    $obj->setFiles([$a, $b]);

    $this->assertNull($obj->getFile('test'));
    $this->assertEquals($a, $obj->getFile('Test\\Trait'));
    $this->assertEquals($b, $obj->getFile('Test\\Sequence'));
    $this->assertTrue($obj->hasFiles());

    $c = new File('Test');
    $obj->addFiles([$c]);
    $this->assertEquals($c, $obj->getFile('Test'));
    $this->assertEquals($c, $obj->getFile('test'));
    $this->assertEquals($a, $obj->getFile('Test\\Trait'));
    $this->assertEquals([$a, $b, $c], $obj->getFiles());

    $obj->removeFile('Test\\Sequence');
    $this->assertNull($obj->getFile('Test\\Sequence'));

    $obj->setFiles([$c]);
    $this->assertEquals($c, $obj->getFile('Test'));
    $this->assertNull($obj->getFile('Test\\Trait'));

    $obj->removeFile('test');
    $this->assertNull($obj->getFile('Test'));
  }

}

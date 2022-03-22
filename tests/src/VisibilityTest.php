<?php

namespace Xylemical\Code;

use PHPUnit\Framework\TestCase;

class VisibilityTest extends TestCase {

  public function testVisibility() {
    $obj = new Visibility();

    $this->assertEquals(Visibility::PUBLIC, $obj->getVisibility());
    $this->assertFalse($obj->isVisible(-1));
    $this->assertTrue($obj->isVisible(Visibility::PUBLIC));
    $this->assertTrue($obj->isVisible(Visibility::PROTECTED));
    $this->assertTrue($obj->isVisible(Visibility::PRIVATE));

    $obj->setProtected();
    $this->assertEquals(Visibility::PROTECTED, $obj->getVisibility());
    $this->assertFalse($obj->isVisible(-1));
    $this->assertFalse($obj->isVisible(Visibility::PUBLIC));
    $this->assertTrue($obj->isVisible(Visibility::PROTECTED));
    $this->assertTrue($obj->isVisible(Visibility::PRIVATE));

    $obj->setPrivate();
    $this->assertEquals(Visibility::PRIVATE, $obj->getVisibility());
    $this->assertFalse($obj->isVisible(-1));
    $this->assertFalse($obj->isVisible(Visibility::PUBLIC));
    $this->assertFalse($obj->isVisible(Visibility::PROTECTED));
    $this->assertTrue($obj->isVisible(Visibility::PRIVATE));

    $obj->setPublic();
    $this->assertEquals(Visibility::PUBLIC, $obj->getVisibility());

    $obj = new Visibility(Visibility::PROTECTED);
    $this->assertEquals(Visibility::PROTECTED, $obj->getVisibility());
  }

}

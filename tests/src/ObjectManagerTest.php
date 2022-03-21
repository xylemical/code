<?php

namespace Xylemical\Code;

use PHPUnit\Framework\TestCase;

class ObjectManagerTest extends TestCase {

  public function testObjectManager() {
    $this->assertEquals('test', ObjectManager::get('test', 'test', 'test'));
    $this->assertEquals('test', ObjectManager::get('test', 'test', 'not-test'));

    ObjectManager::get('foo', 'bar', 'test');

    ObjectManager::reset('test');
    $this->assertEquals('test', ObjectManager::get('foo', 'bar', 'not-test'));
    $this->assertEquals('test', ObjectManager::get('test', 'test', 'test'));
    $this->assertEquals('test', ObjectManager::get('test', 'test', 'not-test'));

    ObjectManager::reset();
    $this->assertEquals('not-test', ObjectManager::get('foo', 'bar', 'not-test'));
    $this->assertEquals('not-test', ObjectManager::get('test', 'test', 'not-test'));
  }

}

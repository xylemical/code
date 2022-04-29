<?php

declare(strict_types=1);

namespace Xylemical\Code;

use PHPUnit\Framework\TestCase;

/**
 * Tests \Xylemical\Code\ObjectManager.
 */
class ObjectManagerTest extends TestCase {

  /**
   * Tests sanity.
   */
  public function testObjectManager(): void {
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

<?php

namespace Drupal\Tests\academy\Kernel;

use Drupal\KernelTests\KernelTestBase;

/**
 * Test description.
 *
 * @group academy
 */
class KernelTest extends KernelTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'academy',
    'student',
    'image',
    'user',
    'file',
  ];

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();
    // Mock required services here.
    $this->installEntitySchema('student');
    $this->installEntitySchema('user');
    $this->installEntitySchema('file');
    $this->installSchema('file', 'file_usage');
  }

  /**
   * Test callback.
   */
  public function testSomething() {
    $student = $this->container->get('entity_type.manager')->getStorage('student')->create(
      [
        'id' => 1,
        'name' => 'Ivan',
        'lastname' => 'Chavarro',
        'uid' => 1,
      ]
    );
    self::assertSame('Ivan', $student->label());
    self::assertSame(1, $student->id());
  }

}

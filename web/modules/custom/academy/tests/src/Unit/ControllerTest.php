<?php

namespace Drupal\Tests\academy\Unit;

use Drupal\Tests\UnitTestCase;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\academy\Controller\AcademyController;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\DependencyInjection\ContainerBuilder;

/**
 * Test description.
 *
 * @group academy
 */
class ControllerTest extends UnitTestCase {

  protected $page;

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();
    $container = new ContainerBuilder();

    $entity = $this->getMockBuilder('\Drupal\student\Entity\Student')
      ->disableOriginalConstructor()
      ->getMock();
    $entity->expects($this->any())
      ->method('getFullName')
      ->willReturn('Ivan Chavarro');

    $entity->expects($this->any())
      ->method('getCacheTags')
      ->willReturn(['student:1']);

    $entityStorage = $this->getMockBuilder(EntityStorageInterface::class)
      ->disableOriginalConstructor()
      ->getMock();
    $entityStorage->expects($this->any())
      ->method('load')
      ->willReturn($entity);

    $entityTypeManager = $this->getMockBuilder(EntityTypeManagerInterface::class)
      ->disableOriginalConstructor()
      ->getMock();
    $entityTypeManager->expects($this->any())
      ->method('getstorage')
      ->willReturn($entityStorage);

    $container->set('entity_type.manager', $entityTypeManager);

    \Drupal::setContainer($container);

    $this->page = new AcademyController($container);
  }

  /**
   * Tests something.
   */
  public function testSomething() {
    $output = $this->page->build();
    self::assertArrayHasKey('students', $output);
    self::assertSame('<h3>Ivan Chavarro</h3>', $output['students']['#markup']);
  }

}

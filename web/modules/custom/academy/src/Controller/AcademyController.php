<?php

namespace Drupal\academy\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for academy routes.
 */
class AcademyController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {
    /** @var \Drupal\student\StudentInterface $student */
    $student = $this->entityTypeManager()->getStorage('student')->load(1);
    $build['title'] = [
      '#type' => 'item',
      '#markup' => 'New students',
    ];

    $build['students'] = [
      '#type' => 'item',
      '#markup' => '<h3>' . $student->getFullName() . '</h3>',
      '#cache' => [
        'tags' => $student->getCacheTags(),
        'context' => $student->getCacheContexts(),
      ],
    ];

    return $build;
  }

}

<?php

namespace Drupal\student;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;

/**
 * Provides an interface defining a student entity type.
 */
interface StudentInterface extends ContentEntityInterface, EntityChangedInterface {

  /**
   * Get student Photo.
   *
   * @return array
   *   The student photo.
   */
  public function getPhoto();

  /**
   * Get URI of the photo.
   *
   * @return string
   *   Image URI
   */
  public function getPhotoUri();

}

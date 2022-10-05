<?php

namespace Drupal\student;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;

/**
 * Provides an interface defining a student entity type.
 */
interface StudentInterface extends ContentEntityInterface, EntityChangedInterface {

}

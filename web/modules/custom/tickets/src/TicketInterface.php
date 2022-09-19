<?php

namespace Drupal\tickets;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface defining a ticket entity type.
 */
interface TicketInterface extends ContentEntityInterface, EntityOwnerInterface, EntityChangedInterface {

}

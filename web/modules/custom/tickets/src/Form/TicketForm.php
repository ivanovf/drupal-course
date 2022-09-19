<?php

namespace Drupal\tickets\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for the ticket entity edit forms.
 */
class TicketForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $result = parent::save($form, $form_state);

    $entity = $this->getEntity();

    $message_arguments = ['%label' => $entity->toLink()->toString()];
    $logger_arguments = [
      '%label' => $entity->label(),
      'link' => $entity->toLink($this->t('View'))->toString(),
    ];

    switch ($result) {
      case SAVED_NEW:
        $this->messenger()->addStatus($this->t('New ticket %label has been created.', $message_arguments));
        $this->logger('tickets')->notice('Created new ticket %label', $logger_arguments);
        break;

      case SAVED_UPDATED:
        $this->messenger()->addStatus($this->t('The ticket %label has been updated.', $message_arguments));
        $this->logger('tickets')->notice('Updated ticket %label.', $logger_arguments);
        break;
    }

    $form_state->setRedirect('entity.ticket.canonical', ['ticket' => $entity->id()]);

    return $result;
  }

}

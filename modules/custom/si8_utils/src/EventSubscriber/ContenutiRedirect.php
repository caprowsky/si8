<?php

namespace Drupal\si8_utils\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Controlla redirect per 404.
 */
class ContenutiRedirect implements EventSubscriberInterface {

  public $args;
  public $event;
  public $main_arg;
  public $status;

  /**
   * Redirect per nodi e termini mancanti nella migrazione
   *
   * @param \Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent $event
   *   The event to process.
   *
   * @return object
   */
  public function on404(GetResponseForExceptionEvent $event) {
    $current_path = $event->getRequest()->getRequestUri();
    $this->args = explode('/', $current_path);
    $this->main_arg = $this->args[1];
    $this->status = '301';
    $query = \Drupal::request()->query;

    // Check notizie ed eventi
    $paths = ['notizie', 'eventi'];
    if (isset($this->args) && in_array($this->args[2], $paths)) {
      $new_url = '/news/' . $this->args[3];
      $this->setRedirect($event, $new_url);
      return $this->event;

    }

    return $event;
  }

  /**
   * Set redirect
   * @param \Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent $event
   * @return mixed
   */
  private function setRedirect($event, $new_url) {
    $event->setResponse(new RedirectResponse($new_url, $this->status));
    return;
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events[KernelEvents::EXCEPTION][] = ['on404', 50];
    return $events;
  }

}

<?php

namespace Drupal\si8_utils;

class Utils {

  public function getViewWithArgument($views_name, $display_id, $args = []) {
    $view = \Drupal\views\Views::getView($views_name);

    if (!is_array($args)) {
      $args = [$args];
    }

    if (is_object($view)) {
      $view->setArguments($args);
      $view->setDisplay($display_id);
      $view->preExecute();
      $view->execute();
      return $view->buildRenderable($display_id, $args);
    } else {
      return FALSE;
    }
  }
}
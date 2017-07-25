<?php

/**
 * @file
 * Contains Drupal\so8_utils\BreadcrumbBuilder.
 */

namespace Drupal\si8_utils;

use Drupal\Core\Breadcrumb\Breadcrumb;
use Drupal\Core\Breadcrumb\BreadcrumbBuilderInterface;
use Drupal\Core\Link;
use Drupal\Core\Url;
use Drupal\Core\Routing\RouteMatchInterface;

/**
 * Class BreadcrumbBuilder.
 *
 * @package Drupal\si8_utils
 */
class BreadcrumbBuilder implements BreadcrumbBuilderInterface {

  /**
   * {@inheritdoc}
   */
  public function applies(RouteMatchInterface $route_match) {
    return $this->check_path($route_match);
  }

  /**
   * {@inheritdoc}
   */
  public function build(RouteMatchInterface $route_match) {
    $breadcrumb = new Breadcrumb();
    $breadcrumb->addCacheContexts(['route']);

    $route_object = $route_match->getRouteObject();

    $links = [];

    // Breadcrumb custom argomenti notizie
    if ($route_object->getPath() == '/news/{arg_0}/{arg_1}') {
      $links[] = Link::createFromRoute(t('Home'), '<front>');
      $links[] = Link::createFromRoute(t('News'), 'view.news.news');
    }

    // Breadcrumb custom sportello unico
    $suape_paths = ['/suape/dove-si-trova', '/suape/trova-procedimento'];
    if (in_array($route_object->getPath(), $suape_paths)) {
      $url = Url::fromUri('internal:/sportello-unico');
      $links[] = Link::createFromRoute(t('Home'), '<front>');
      $links[] = Link::fromTextAndUrl(t('Suape'), $url);
    }

    $breadcrumb->setLinks($links);

    return $breadcrumb;
  }

  /**
   * @param RouteMatchInterface $route_match
   *
   * @return bool
   */
  private function check_path($route_match) {
    $route_object = $route_match->getRouteObject();
    $paths = ['/suape/dove-si-trova', '/news/{arg_0}/{arg_1}', '/suape/trova-procedimento'];

    if (in_array($route_object->getPath(), $paths)) {
      return TRUE;
    }

    return FALSE;
  }
}

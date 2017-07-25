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
    $route_object = $route_match->getRouteObject();
    if ($route_object->getPath() == '/news/{arg_0}/{arg_1}') {
      return TRUE;
    }

    return FALSE;
  }

  /**
   * {@inheritdoc}
   */
  public function build(RouteMatchInterface $route_match) {
    $breadcrumb = new Breadcrumb();
    $breadcrumb->addCacheContexts(['route']);

    // Add logic here that builds up the breadcrumbs based on desired behaviour.
    $links[] = Link::createFromRoute(t('Home'), '<front>');
    $links[] = Link::createFromRoute(t('News'), 'view.news.news');

    $breadcrumb->setLinks($links);

    return $breadcrumb;
  }

}
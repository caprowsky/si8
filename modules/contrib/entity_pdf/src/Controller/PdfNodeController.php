<?php

namespace Drupal\entity_pdf\Controller;

use Drupal\Core\Entity\EntityInterface;
use Drupal\node\Controller\NodeViewController;
use Mpdf\Output\Destination;
use Symfony\Component\HttpFoundation\Response;

/**
 * Defines a controller to render a single node.
 */
class PdfNodeController extends NodeViewController {

  public function view(EntityInterface $node, $view_mode, $langcode = NULL) {
    $build = [
      '#theme' => 'htmlpdf',
      '#title' => parent::title($node),
      '#content' => parent::view($node, $view_mode, $langcode),
    ];

    $output = render($build);

    // If you want the test HTML output, uncomment this:
    //return new Response(render($build), 200, []);

    $config = [
      'tempDir' => DRUPAL_ROOT . '/sites/default/files/entity_pdf',
    ];
    $mpdf = new \Mpdf\Mpdf($config);
    $mpdf->SetBasePath(\Drupal::request()->getSchemeAndHttpHost());
    $mpdf->SetTitle($this->title($node));
    $mpdf->WriteHTML($output);
    $content = $mpdf->Output('', Destination::INLINE);

    $headers = [
      'Content-Type: application/pdf',
      'Content-disposition: inline; filename="' . $this->title($node) . '.pdf"',
    ];

    return new Response($content, 200, $headers);
  }

  /**
   * @inheritdoc
   */
  public function title(EntityInterface $node) {
    return parent::title($node);
  }
}

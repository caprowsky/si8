<?php

namespace Drupal\si8_utils\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Url;

/**
 * Provides a 'ElencoArgomenti' block.
 *
 * @Block(
 *  id = "elenco_argomenti",
 *  admin_label = @Translation("Elenco Argomenti"),
 * )
 */
class ElencoArgomenti extends BlockBase
{

    /**
     * {@inheritdoc}
     */
    public function build()  {
        $build = [];

        $facets = [];

        $container = \Drupal::getContainer();
        $terms = $container->get('entity.manager')
            ->getStorage('taxonomy_term')
            ->loadTree('argomenti');
        if (!empty($terms)) {
            foreach ($terms as $term) {
              $langcode = \Drupal::languageManager()->getCurrentLanguage()->getId();
              $trans = \Drupal::transliteration();
              $transformed = strtolower($trans->transliterate($term->name, $langcode));

              $facets[] = array(
                    'value' => array(
                        '#type' => 'link',
                        '#url' => Url::fromUri('internal:/news/' . $term->tid . '/' . str_replace(' ', '-', $transformed), array('set_active_class' => TRUE)),
                        '#title' => $term->name,
                    ),
                );
            }
        }

        $render_array = array(
            '#theme' => 'item_list',
            '#title' => 'Argomenti',
            '#items' => $facets,
        );

        $build['elenco_argomenti']['#markup'] = render($render_array);

        return $build;
    }
}

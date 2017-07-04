<?php
/**
 * @file
 * Contains \Drupal\si8_utils\Form\Admin.
 */

namespace Drupal\si8_utils\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\UrlHelper;
/**
 * Contribute form.
 */
class Admin extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'si8_utils_config_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['valuta_link'] = [
      '#type' => 'textfield',
      '#title' => 'Valuta sito',
      '#description' => 'Inserisci l\'url assoluto (compreso di http) del form per la valutazione del sito.',
      '#default_value' => \Drupal::state()->get('si8_utils.valuta_link'),
    ];


    $form['submit'] = [
      '#type' => 'submit',
      '#value' => t('Submit'),
    ];
    return $form;
  }


  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $url = $form_state->getValue('valuta_link');
    if (!UrlHelper::isValid($url, $absolute = TRUE)) {
      $form_state->setErrorByName('valida_link', $this->t("L'indirizzo '%url' is invalid, deve essere assoluto.", array('%url' => $form_state->getValue('valuta_link'))));

    }


  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $url = $form_state->getValue('valuta_link');
    \Drupal::state()->set('si8_utils.valuta_link', $url);
    drupal_set_message('Le configurazioni sono state salvate');

  }
}

?>
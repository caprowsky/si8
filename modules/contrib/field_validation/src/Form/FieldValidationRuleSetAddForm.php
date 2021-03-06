<?php

/**
 * @file
 * Contains \Drupal\field_validation\Form\FieldValidationRuleSetAddForm.
 */

namespace Drupal\field_validation\Form;

use Drupal\Core\Form\FormStateInterface;

/**
 * Controller for FieldValidationRuleSet addition forms.
 */
class FieldValidationRuleSetAddForm extends FieldValidationRuleSetFormBase {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state, $entity_type = '') {
/*
    $form['label'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Field validation rule set name'),
      '#default_value' => $this->entity->label(),
      '#required' => TRUE,
    );
    $form['name'] = array(
      '#type' => 'machine_name',
      '#machine_name' => array(
        'exists' => array($this->entityStorage, 'load'),
      ),
      '#default_value' => $this->entity->id(),
      '#required' => TRUE,
    );
	*/
	$entity_types = \Drupal::entityManager()->getDefinitions();
	$entity_type_options =array();
	foreach($entity_types as $key => $entitytype){
	  
	  if($entitytype instanceof \Drupal\Core\Entity\ContentEntityTypeInterface){
	    $entity_type_options[$key] = $entitytype->getLabel();
	  }
	  if($key =='block_content'){
	   // drupal_set_message($key);
		//drupal_set_message(var_export($entity_type, true));
	  }
	}
    $form['entity_type'] = array(
      '#type' => 'select',
      '#title' => $this->t('Entity Type'),
	  '#options' => $entity_type_options,
      '#default_value' => $entity_type,
      '#required' => TRUE,
      '#ajax' => array(
        'callback' => '::updateBundle',
        'wrapper' => 'edit-bundle-wrapper',
      ),	  
    );
	$default_entity_type = $form_state->getValue('entity_type',$entity_type);
	$default_entity_type = 'node';
    $form['bundle'] = array(
      '#type' => 'select',
      '#title' => $this->t('Bundle'),
      //'#default_value' => $form_state->getValue('bundle'),
	  '#options' => $this->findBundle($default_entity_type),
      '#required' => TRUE,
      '#prefix' => '<div id="edit-bundle-wrapper">',
      '#suffix' => '</div>',
      '#validated' => TRUE,	 	  
    );
    return parent::form($form, $form_state);
  }
  /**
   * Handles switching the configuration type selector.
   */
  public function updateBundle($form, FormStateInterface $form_state) {
    $form['bundle']['#default_value'] = '';
    $form['bundle']['#options'] = $this->findBundle($form_state->getValue('entity_type'));
    return $form['bundle'];

  }  
  /**
   * Handles switching the bundle selector.
   */
  protected function findBundle($entity_type) {
    //\Drupal::logger('field_validation')->notice('1234:' . $field_name);
    $bundle_options = array(
      '' => t('- Select -'),
    );
	if(empty($entity_type)){
	  return $bundle_options;
	}else{
     //drupal_set_message($entity_type);
	$bundles = \Drupal::entityManager()->getBundleInfo($entity_type);

	  foreach($bundles as $key=>$bundle){
	    //drupal_set_message(var_export($bundle, true));
	    $bundle_options[$key] = isset($bundle['label']) ? $bundle['label'] : $key;
	  }
    }
    return $bundle_options;
  }  
  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    // The fieldValidationRule configuration is stored in the 'data' key in the form,
    // pass that through for validation.
	$entity_type = $form_state->getValue('entity_type');
	$bundle = $form_state->getValue('bundle');
	$form_state->setValue('name', $entity_type . '_' . $bundle);
	$form_state->setValue('label', $entity_type . ' ' . $bundle . ' ' . 'validation');

  }  
  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);
    drupal_set_message($this->t('Field validation rule set %name was created.', array('%name' => $this->entity->label())));
  }

  /**
   * {@inheritdoc}
   */
  public function actions(array $form, FormStateInterface $form_state) {
    $actions = parent::actions($form, $form_state);
    $actions['submit']['#value'] = $this->t('Create new field validation rule set');

    return $actions;
  }

}

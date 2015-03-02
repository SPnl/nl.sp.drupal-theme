<?php
//drupal_theme_rebuild();
//drupal_flush_all_caches();

function spruit_spnet_form_alter(&$form, &$form_state, $form_id) {

  // Replace username with 'lidnummer' on forms title / label
  // Use lidnummer as login forms title / label
  
  if($form_id == 'user_login') {
  	$form['name']["#title"] = "Lidnummer";
  }

  if($form_id == 'user_pass') {
  	$form['name']["#title"] = "Lidnummer of e-mailadres";
  }
}

<?php
//drupal_theme_rebuild();
//drupal_flush_all_caches();

function spnet_spruit_theme(&$existing, $type, $theme, $path) {
	$items = array();

	$items['user_login'] = array(
		'render element'       => 'form',
		'template'             => 'templates/user-login',
		'preprocess functions' => array('spnet_spruit_preprocess_user_login'),
	);

	return $items;
}

function spnet_spruit_preprocess_user_login(&$variables) {
	$variables['intro_text'] = t('This is my awesome login form');
	$variables['rendered'] = drupal_render_children($variables['form']);
}
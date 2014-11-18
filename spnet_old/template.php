<?php

/* Custom settings handling */

function get_custom_settings() {
	return [
		'naam'  => 'SP CiviCRM',
		'type'  => 'leden',
		'title' => 'SP',
	];
}

/**
 *    TEMPLATE PREPROCESSING
 */

function spnet_preprocess(&$variables, $hook) {
	$variables['afdelingen'] = get_custom_settings();
}

/**
 *    HTML Preprocess
 */

function spnet_preprocess_html(&$variables) {

	// Add type to body classes
	$variables['classes_array'][] = $variables['afdelingen']['type'];

	// Add SP or ROOD to page title
	$titleSite = check_plain(variable_get('site_name', 'Drupal'));
	$title = $variables['afdelingen']['title'] . ' ' . $titleSite;

	if (drupal_get_title()) {
		$title = strip_tags(drupal_get_title()) . ' :: ' . $title;
	} else {
		if (variable_get('site_slogan', '')) {
			$title = $title . ', ' . check_plain(variable_get('site_slogan', ''));
		}
	}

	$variables['head_title'] = $title;

} //END preprocess_html


/**
 *  PAGE Preprocess
 */

function spnet_preprocess_page(&$variables) {

	// get the logo from planet SP
	$logo_title = '<h1 id="site-branding"><a href="http://www.sp.nl"><img src="http://planet.sp.nl/splogo141.gif" width="141" height="72" alt="SP logo" title="Socialistische Partij" class="sp-logo" /></a>';
	$logo_title .= '<a href="' . $variables['base_path'] . '">';
	$logo_title .= '<span class="site-name">' . $variables['site_name'] . '</span></a></h1>';

	$variables['branding'] = array(
		'#type'   => 'markup',
		'#markup' => $logo_title,
	);

	// Breadcrumb seperator above content
	$afdelingen_slogan = variable_get('site_slogan', '');

	if ($variables['is_front']) {

		if (!empty($afdelingen_slogan)) {
			$seperator_text = $afdelingen_slogan;
		} else {
			$seperator_text = $variables['site_name'] . ' ' . $variables['afdelingen']['title'];
		}
	} else {

		$seperator_text = '<a href="' . $variables['front_page'] . '">';

		if ($variables['afdelingen']['type'] == 'rood') {
			$seperator_text .= $variables['site_name'] . '</a>';
		} elseif (!empty($afdelingen_slogan)) {
			$seperator_text .= $afdelingen_slogan . '</a>';
		} else {
			$seperator_text .= $variables['afdelingen']['title'] . ' ' . $variables['site_name'] . '</a>';
		}

		$pagetitle = strip_tags(drupal_get_title());

		$title_length = 70;
		// shorten title to last word before max number of characters
		if (strlen($pagetitle) >= $title_length) {
			$pagetitle = substr($pagetitle, 0, strrpos(substr($pagetitle, 0, $title_length), ' ')) . '&hellip;';
		}
		$seperator_text .= ' &rsaquo; ' . $pagetitle;
	}

	$variables['afdelingen_seperator'] = '<h3 class="title seperator-title">' . $seperator_text . '</h3>';

}

/**
 *    NODE preprocess
 */

function spnet_preprocess_node(&$variables) {

	// Read more and blog-links are removed for content links
	unset($variables['content']['links']['node']);
	unset($variables['content']['links']['blog']);
	unset($variables['content']['links']['comment']);

	$variables['content']['body']['#weight'] = -10; // unless stated otherwise, content goes first
	$variables['content']['links']['#weight'] = 5;

	// Read more link
	if ($variables['teaser']) {
		$variables['content']['read_more'] = array(
			'#type'   => 'markup',
			'#markup' => '<span class="read-more"><a href="' . $variables['node_url'] . '">&rsaquo; Lees verder</a></span>',
			'#weight' => 0, // read more after content
		);
	}

	// Special Date format
	$variables['afd_date'] = format_date($variables['node']->created, 'custom', 'd-m-Y');

}

//END preprocess_node

function spnet_preprocess_comment(&$variables) {
	$comment = $variables['elements']['#comment'];
	$variables['created_date'] = format_date($comment->created, 'custom', 'd-m-Y');
	$variables['created_time'] = format_date($comment->created, 'custom', 'H:i');
}

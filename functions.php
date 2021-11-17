<?php
// Remove all default WP template redirects/lookups
remove_action('template_redirect', 'redirect_canonical');

// Redirect all requests to index.php so the Vue app is loaded and 404s aren't thrown
function remove_redirects()
{
	add_rewrite_rule('^/(.+)/?', 'index.php', 'top');
}
add_action('init', 'remove_redirects');

// Load scripts
function load_vue_scripts()
{
	wp_enqueue_script(
		'lesbriquesrouges-js',
		get_stylesheet_directory_uri() . '/dist/scripts/index.js',
		array('jquery'),
		filemtime(get_stylesheet_directory() . '/dist/scripts/index.js'),
		true
	);

	wp_enqueue_style(
		'lesbriquesrouges-css',
		get_stylesheet_directory_uri() . '/dist/styles.css',
		null,
		filemtime(get_stylesheet_directory() . '/dist/styles.css')
	);
}
add_action('wp_enqueue_scripts', 'load_vue_scripts', 100);

function lesbriquesrouges_register_nav_menu()
{
	register_nav_menus(
		array("primary" => __("Menu principal", "lesbriquesrouges"))
	);
}
add_theme_support('menus');
add_action('after_setup_theme', 'lesbriquesrouges_register_nav_menu');

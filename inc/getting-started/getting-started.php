<?php
/**
 * Getting Started Page.
 *
 * @package Tech Blogging
 */


$tech_blogging_theme = wp_get_theme();
$tech_blogging_version = $tech_blogging_theme->get('Version');
$tech_blogging_name = $tech_blogging_theme->get('Name');

define('TECH_BLOGGING_THEME_VERSION', $tech_blogging_version);
define('TECH_BLOGGING_THEME_NAME', $tech_blogging_name);
require get_template_directory() . '/inc/getting-started/class-getting-start-plugin-helper.php';

if( ! function_exists( 'tech_blogging_getting_started_admin_scripts' ) ) :
/**
 * Load Getting Started styles in the admin
 */
function tech_blogging_getting_started_admin_scripts( $hook ){
    wp_enqueue_style( 'tech-blogging-focus', get_template_directory_uri() . '/inc/getting-started/css/focus.css', false, TECH_BLOGGING_THEME_VERSION );
	// Load styles only on our page
	if( 'appearance_page_tech-blogging-getting-started' != $hook ) return;

    wp_enqueue_style( 'tech-blogging-getting-started', get_template_directory_uri() . '/inc/getting-started/css/getting-started.css', false, TECH_BLOGGING_THEME_VERSION );

    wp_enqueue_script( 'plugin-install' );
    wp_enqueue_script( 'updates' );
    wp_enqueue_script( 'tech-blogging-getting-started', get_template_directory_uri() . '/inc/getting-started/js/getting-started.js', array( 'jquery' ), TECH_BLOGGING_THEME_VERSION, true );
    wp_enqueue_script( 'tech-blogging-recommended-plugin-install', get_template_directory_uri() . '/inc/getting-started/js/recommended-plugin-install.js', array( 'jquery' ), TECH_BLOGGING_THEME_VERSION, true );
    wp_localize_script( 'tech-blogging-recommended-plugin-install', 'tech_blogging_start_page', array( 'activating' => __( 'Activating ', 'tech-blogging' ) ) );
}
endif;
add_action( 'admin_enqueue_scripts', 'tech_blogging_getting_started_admin_scripts' );

if( ! function_exists( 'tech_blogging_call_plugin_api' ) ) :
/**
 * Plugin API
**/
function tech_blogging_call_plugin_api( $plugin ) {
	include_once ABSPATH . 'wp-admin/includes/plugin-install.php';
	$call_api = plugins_api(
        'plugin_information',
            array(
    		'slug'   => $plugin,
    		'fields' => array(
    			'downloaded'        => false,
    			'rating'            => false,
    			'description'       => false,
    			'short_description' => true,
    			'donate_link'       => false,
    			'tags'              => false,
    			'sections'          => true,
    			'homepage'          => true,
    			'added'             => false,
    			'last_updated'      => false,
    			'compatibility'     => false,
    			'tested'            => false,
    			'requires'          => false,
    			'downloadlink'      => false,
    			'icons'             => true
    		)
    	)
    );
	return $call_api;
}
endif;

if( ! function_exists( 'tech_blogging_check_for_icon' ) ) :
/**
 * Check For Icon
**/
function tech_blogging_check_for_icon( $arr ) {
	if( ! empty( $arr['svg'] ) ){
		$plugin_icon_url = $arr['svg'];
	}elseif( ! empty( $arr['2x'] ) ){
		$plugin_icon_url = $arr['2x'];
	}elseif( ! empty( $arr['1x'] ) ){
		$plugin_icon_url = $arr['1x'];
	}else{
		$plugin_icon_url = $arr['default'];
	}
	return $plugin_icon_url;
}
endif;
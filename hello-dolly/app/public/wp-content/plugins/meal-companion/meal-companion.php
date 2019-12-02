
<?php

/*
Class 25.6

Plugin Name: Meal Companion Plugin
Plugin URI: meal.com
Description: This plugin is made for Meal Companion Theme
Version: 1.0
Author: Morshed
Author URI: morshed.com
License: GPLv2 or later
Text Domain: meal-compnion
Domain Path: /languages/

*/

function mealc_load_text_domain(){
    load_plugin_textdomain('meal-companion',false,dirname(__FILE__)."/languages");
}
add_action('plugins_loaded','mealc_load_text_domain');

function mealc_register_my_cpts_section() {

	/**
	 * Post Type: Sections.
	 */

	$labels = [
		"name" => __( "Sections", "meal-companion" ),
		"singular_name" => __( "section", "meal-companion" ),
	];

	$args = [
		"label" => __( "Sections", "meal-companion" ),
		"labels" => $labels,
		"description" => "",
		"public" => false,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "section", "with_front" => true ],
		"query_var" => true,
		"menu_position" => 5,
		"menu_icon" => "dashicons-media-document",
		"supports" => [ "title", "editor", "thumbnail" ],
        
	];

	register_post_type( "section", $args );
    
    //Receipes
    $labels = [
		"name" => __( "Recipes", "meal-companion" ),
		"singular_name" => __( "recipe", "meal-companion" ),
		"featured_image" => __( "Recipe Photo", "meal-companion" ),
	];

	$args = [
		"label" => __( "Recipes", "meal-companion" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "recipe", "with_front" => false ],
		"query_var" => true,
		"menu_position" => 5,
		"supports" => [ "title", "editor", "thumbnail", "excerpt" ],
        "taxonomies" => array('category')
        
        //"taxonomies" => array('category'),
	];

	register_post_type( "recipe", $args );
}

add_action( 'init', 'mealc_register_my_cpts_section' );



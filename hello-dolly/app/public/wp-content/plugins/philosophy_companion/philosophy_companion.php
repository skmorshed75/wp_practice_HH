<?php
/*
Plugin Name: Philosophy-Companion
Plugin URI: philosophycompaion.com
Description: Companion plugin for the philosophy theme self made
Version: 1.0
Author: Morshed
Author URI: morshed.com
License: GPLV2
Text Domain: philosophy-companion
*/

//Class 23.6
require_once dirname(__FILE__)."/gmap_ui.php";
//End Class 23.6

function philosophy_companion_register_my_cpts_book() {

	/**
	 * Post Type: Books.
	 */

	$labels = [
		"name" => __( "Books", "Philosophy" ),
		"singular_name" => __( "Book", "Philosophy" ),
		"all_items" => __( "My Books", "Philosophy" ),
		"add_new" => __( "New Book", "Philosophy" ),
		"featured_image" => __( "Book Cover", "Philosophy" ),
	];

	$args = [
		"label" => __( "Books", "Philosophy" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => "books",
		"show_in_menu" => true,
		"show_in_nav_menus" => false,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "book", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-share-alt2",
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "page-attributes" ],
		"taxonomies" => [ "category" ],
        "rewrite"   => array(
            'with_front'   => false
        )
	];

	register_post_type( "book", $args );
}

add_action( 'init', 'philosophy_companion_register_my_cpts_book' );

//Class 23.2
function philosophy_button($attributes){
    //Class 23.3
    $default = array(
        'type' => 'primary',
        'title' => __('Button','philosophy'),
        'url' => ''
    );
    
    $button_attributes = shortcode_atts($default,$attributes);
    
    return sprintf('<a target="_blank" class="btn btn--%s full-width" href="%s">%s</a>',
       $button_attributes['type'],
       $button_attributes['url'],
       $button_attributes['title']
    );
    //End Class 23.3
}
add_shortcode('button', 'philosophy_button');

function philosophy_button2($attributes, $content = ''){
    //Class 23.3
    $default = array(
        'type' => 'primary',
        'title' => __('Button','philosophy'),
        'url' => ''
    );
    
    $button_attributes = shortcode_atts($default,$attributes);
    return sprintf('<a target="_blank" class="btn btn--%s full-width" href="%s">%s</a>',
        $button_attributes['type'],
        $button_attributes['url'],
        do_shortcode($content)
            
    );
    //End Class 23.3
}
add_shortcode('button2', 'philosophy_button2');
// End Class 23.2

//Class 23.4
function philosophy_uppercase($attributes, $content=''){
    return strtoupper(do_shortcode($content));
}
add_shortcode('uc','philosophy_uppercase');
//End of Class 23.4

//Class 23.5
function philosophy_google_map($attributes){
    $default = array(
        'place' => 'Uttara Sector 14',
        'width' => '800',
        'height' => '500',
        'zoom'  => '14'
    );
    
    $params = shortcode_atts($default,$attributes);
    
    $map = <<<EOD
    <div>
        <div>
            <iframe width="{$params['width']}" height="{$params['height']}"
                src="https://maps.google.com/maps?q={$params['place']}&t=&z={$params['zoom']}&ie=UTF8&iwloc=&output=embed"
                frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
            </iframe>
        </div>
    </div>    
EOD;
    
    return $map;
}
add_shortcode('gmap','philosophy_google_map');
//End Class 23.5
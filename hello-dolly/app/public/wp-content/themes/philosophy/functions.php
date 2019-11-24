<?php

//18.6
require_once(get_theme_file_path("/inc/tgm.php"));
require_once(get_theme_file_path("/inc/attachments.php"));
require_once( get_theme_file_path( "/widgets/social-icons-widget.php" ) );
require_once( get_theme_file_path( "/inc/cmb2-attached-posts.php" ) ); //Class 21.12
require_once( get_theme_file_path( "/lib/csf/cs-framework.php" ) ); //Class 24.1 Codestar Framework
require_once( get_theme_file_path( "/inc/cs.php" ) ); //Class 24.2 Codestar Framework

define("CS_ACTIVE_LIGHT_THEME", true); //Class 24.2

if ( ! isset( $content_width ) ) $content_width = 960;

//echo site_url();
if(site_url() == "http://hellodolly.local"){
    define("VERSION", time());
} else {
    define("VERSION", wp_get_theme()->get("Version"));
}
    

//BASIC THEME SUPPORT / AFTER THEME SETUP 18.2
function philosophy_theme_setup(){
    load_theme_textdomain( "philosophy" );
    add_theme_support("post-thumbnails");
    add_theme_support("custom-logo"); //18.21
    add_theme_support("title-tag");
    add_theme_support( 'automatic-feed-links' );
    add_theme_support("html5", array('search-form','comment-list'));
    add_theme_support('post-formats', array("image","gallery","quote","audio","video","link"));
    add_editor_style("/assets/css/editor-style.css");
    
    register_nav_menu("topmenu",__("Top Menu","philosophy"));
    
    //Class 18.20 - Foote Navigation Menu
    register_nav_menus(array(
        "footer_left_menu"   => __("Footer Left Menu", "philosophy"),
        "footer_middle_menu" => __("Footer Middle Menu", "philosophy"),
        "footer_right_menu"  => __("Footer Right Menu", "philosophy")
    ));
    
    //name, size, hardcrop
    add_image_size("philosophy-home-square",400,400,true);
    
}
add_action("after_setup_theme", "philosophy_theme_setup");

//SCRIPTS ENQUEUE 18.3
function philosophy_assets(){
    wp_enqueue_style("font-awesome-css", get_theme_file_uri("/assets/css/font-awesome/css/font-awesome.min.css"),null, 1.0);
    wp_enqueue_style("fonts-css", get_theme_file_uri("/assets/css/fonts.css"), null, 1.0);
    wp_enqueue_style("vendor-css",get_theme_file_uri("/assets/css/vendor.css"),null, 1.0);
    wp_enqueue_style("base-css",get_theme_file_uri("/assets/css/base.css"),null, 1.0);
    wp_enqueue_style("main-css", get_theme_file_uri("assets/css/main.css"),null, 1.0);
    wp_enqueue_style("philosophy-css", get_stylesheet_uri(), null, VERSION);
    
    wp_enqueue_script("modernizr-js", get_theme_file_uri("/assets/js/modernizr.js"), null, 1.0);
    wp_enqueue_script("pace-js", get_theme_file_uri("/assets/js/pace.min.js"), null, 1.0);
    wp_enqueue_script("plugins-js", get_theme_file_uri("/assets/js/plugins.js"), array("jquery"), 1.0, true);
    if ( is_singular() ) wp_enqueue_script( "comment-reply" );
    wp_enqueue_script("main-js", get_theme_file_uri("/assets/js/main.js"), array("jquery"), 1.0, true);
}
add_action("wp_enqueue_scripts","philosophy_assets");


function philosophy_pagination(){
    global $wp_query;
    $links = paginate_links(array(
        'current'   => max(1,get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'type'  => 'list',
        'mid-size'  => 3 //increase number of pagination
    ));
    $links = str_replace("page-numbers", "pgn__num", $links); //Replace class pgn__num instead of page-numbers / class change
    $links = str_replace("<ul class='pgn__num'>","<ul>",$links);
    $links = str_replace("prev pgn__num","pgn__prev",$links);
    $links = str_replace("next pgn__num", "pgn__next",$links);
    echo wp_kses_post($links);
}

remove_action("term_description", "wpautop"); //Remove P tag automatically 18.44 [3.34]

//Class 18.15
function philosophy_widgets(){
    register_sidebar(array(
        'name'  => __("About Us Page", 'philosophy'),
        'id'    => 'about-us',
        'description'   => __('Widgets in this area will show in', 'philosophy'),
        'before_widget' => '<div id = "%1$s" class = "col-block %2$s">',
        'after_widget'   => '</div>',
        'before_title'  => '<h3 class = "quarter-top-margin">',
        'after_title'  => '</h3>',
    ));    
    register_sidebar(array(
        'name'  => __("Contact Page Maps Section", 'philosophy'),
        'id'    => 'contact-maps',
        'description'   => __('Widgets in this area will show in Contact Page', 'philosophy'),
        'before_widget' => '<div id = "%1$s" class = "%2$s">',
        'after_widget'   => '</div>',
        'before_title'  => '',
        'after_title'  => '',
    )); 
    register_sidebar(array(
        'name'  => __("Contact Page Information", 'philosophy'),
        'id'    => 'contact-info',
        'description'   => __('Widgets in this area will show in Contact Page', 'philosophy'),
        'before_widget' => '<div id = "%1$s" class = "col-block %2$s">',
        'after_widget'   => '</div>',
        'before_title'  => '<h3 class = "quarter-top-margin">',
        'after_title'  => '</h3>',
    ));  
    register_sidebar(array(
        'name'  => __("Before Footer Section", 'philosophy'),
        'id'    => 'before-footer-right',
        'description'   => __('Before Footer Section Right Side.', 'philosophy'),
        'before_widget' => '<div id = "%1$s" class = "%2$s">',
        'after_widget'   => '</div>',
        'before_title'  => '<h3>',
        'after_title'  => '</h3>',
    ));    
    //Class 18.20
    register_sidebar(array(
        'name'  => __("Footer Right Section", 'philosophy'),
        'id'    => 'footer-right',
        'description'   => __('Footer Section Right Side.', 'philosophy'),
        'before_widget' => '<div id = "%1$s" class = "col-five md-full end s-footer__subscribe %2$s">',
        'after_widget'   => '</div>',
        'before_title'  => '<h4>',
        'after_title'  => '</h4>',
    )); 
    register_sidebar(array(
        'name'  => __("Footer Bottom Section", 'philosophy'),
        'id'    => 'footer-bottom',
        'description'   => __('Footer Section Bottom Side.', 'philosophy'),
        'before_widget' => '<div id = "%1$s" class = "%2$s">',
        'after_widget'   => '</div>',
        'before_title'  => '',
        'after_title'  => '',
    )); 
    //Class 18.21
    register_sidebar(array(
        'name'  => __("Header Section", 'philosophy'),
        'id'    => 'header-section',
        'description'   => __('Header Section Social Icon.', 'philosophy'),
        'before_widget' => '<div id = "%1$s" class = "%2$s">',
        'after_widget'   => '</div>',
        'before_title'  => '',
        'after_title'  => '',
    ));
}
add_action("widgets_init", "philosophy_widgets");

//Class 18.21
function philosophy_search_form($form){
    $home_dir = home_url("/");
    $search_for = __("Search for:","philosophy");
    $title = __("Search for:","philosophy");
    $value = __("Search", "philosophy");
    //21.7
    $post_type = <<<PT
        <input type="hidden" name="post_type" value="post">
PT;
    
    if(is_post_type_archive('book')){
        $post_type = <<<PT
        <input type="hidden" name="post_type" value="book">
PT;
    }
    //end 21.7
    
    $newform      = <<<FORM
    <form role="search" method="get" class="header__search-form" action="{$home_dir}">
        <label>
            <span class="hide-content">{$search_for}</span>
            <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s" title="{$title}" autocomplete="off">
        </label>  
        {$post_type}
        <input type="submit" class="search-submit" value="{$value}">
    </form>    
FORM;

    return $newform;

}

add_filter( "get_search_form", "philosophy_search_form" );

//Class 21.10
//Edit / modify / change permalink name
function philosophy_cpt_slug_fix($post_link, $id){
    $p = get_post($id);
    if(is_object($p) && 'chapter' == get_post_type($id)){
        $parent_post_id = get_field('parent_book');
        $parent_post = get_post($parent_post_id);
        if($parent_post){
            $post_link = str_replace("%book%",$parent_post->post_name,$post_link);
        }        
    }
    return $post_link;
    
}
add_filter('post_type_link','philosophy_cpt_slug_fix',1,2);

//Class 22.2
function philosophy_footer_language_items($title){
    if(is_post_type_archive('book') || is_tax('language')){
        $title = __("Languages","philosophy");
    }
    return $title;
}
add_filter('philosophy_footer_tag_heading', 'philosophy_footer_language_items');

function philosophy_footer_language_terms($tags){
    if(is_post_type_archive('book') || is_tax('language')){
        $tags = get_terms(array(
            'taxonomy'  => 'language',
            'hide_empty' => true,
            
        ));
    }
    return $tags;
}
add_filter('philosophy_footer_tag_items', 'philosophy_footer_language_terms');






<?php
//Class 25.2

//Class 25.7
require_once get_theme_file_path("/lib/csf/cs-framework.php");
require_once get_theme_file_path("/inc/metaboxes/section.php");
require_once get_theme_file_path("/inc/metaboxes/page.php");
//Class 25.9
require_once get_theme_file_path("/inc/metaboxes/section-banner.php");
//Class 25.10
require_once get_theme_file_path("/inc/metaboxes/section-featured.php");
//Class 25.11
require_once get_theme_file_path("/inc/metaboxes/section-gallery.php");
//Class 25.12
require_once get_theme_file_path("/inc/metaboxes/section-chef.php");
//Class 25.13
require_once get_theme_file_path("/inc/metaboxes/section-services.php");

define('CS_ACTIVE_FRAMEWORK', false);
define('CS_ACTIVE_METABOX', true);
define('CS_ACTIVE_TAXONOMY', false);
define('CS_ACTIVE_SHORTCODE', false);
define('CS_ACTIVE_CUSTOMIZE', false);
//End Class 25.7


//echo site_url();
if(site_url() == "http://hellodolly.local"){
    define("VERSION", time());
} else {
    define("VERSION", wp_get_theme()->get("Version"));
}

function meal_theme_setup(){    
    load_theme_textdomain('meal', get_template_directory()."/languages");
    //Create a directory LANGUAGES in meal folder
    add_theme_support('post-thumbnails');
    add_theme_support('title-tags');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'gallery',
        'caption',
        'comment-list'    
    ));
    add_theme_support('custom-logo');
}
add_action('after_setup_theme','meal_theme_setup');


function meal_theme_assets(){
    //FONTS
    wp_enqueue_style('meal-fonts','//fonts.googleapis.com/css?family=Playfair+Display:300,400,700,800|Open+Sans:300,400,700"');
    wp_enqueue_style('ionicons',get_theme_file_uri('/assets/fonts/ionicons/css/ionicons.min.css'), null, 1.0);
    wp_enqueue_style('fontawesome',get_theme_file_uri('/assets/fonts/fontawesome/css/font-awesome.min.css'),null, 1.0);
    wp_enqueue_style('flaticon',get_theme_file_uri('/assets/fonts/flaticon/font/flaticon.css'),null, 1.0);
    
    //CSS FILES
    wp_enqueue_style('bootstrap-css',get_theme_file_uri('/assets/css/bootstrap.css'),null,1.0);
    wp_enqueue_style('animate-css',get_theme_file_uri('/assets/css/animate.css'),null,1.0);
    wp_enqueue_style('owl.carousel.min.css',get_theme_file_uri('/assets/css/owl.carousel.min.css'),null, 1.0);
    wp_enqueue_style('magnific-popup-css',get_theme_file_uri('/assets/css/magnific-popup.css'),null, 1.0);
    wp_enqueue_style('aos-css',get_theme_file_uri('/assets/css/aos.css'),null,1.0);
    wp_enqueue_style('boostrap-datepicker-css',get_theme_file_uri('/assets/css/bootstrap-datepicker.css'),null,1.0);
    wp_enqueue_style('timepicker-css',get_theme_file_uri('/assets/css/jquery.timepicker.css'),null, 1.0);
    wp_enqueue_style('meal-portfolio-css',get_theme_file_uri('/assets/css/portfolio.css'),null, 1.0);
    wp_enqueue_style('meal-style-css', get_theme_file_uri('/assets/css/style.css'),null, 1.0);
    wp_enqueue_style('meal-stylesheet',get_stylesheet_uri(),null, VERSION);
    
    //JS FILES
    wp_enqueue_script('popper-js',get_theme_file_uri('/assets/js/popper.min.js'),array('jquery'),1.0, true); 
    wp_enqueue_script('bootstrap-js',get_theme_file_uri('/assets/js/bootstrap.min.js'),array('jquery'),1.0, true);    
    wp_enqueue_script('owl-carousel-js',get_theme_file_uri('/assets/js/owl.carousel.min.js'),array('jquery'), 1.0, true);
    wp_enqueue_script('waypoints-js',get_theme_file_uri('/assets/js/jquery.waypoints.min.js'),array('jquery'), 1.0, true);
    wp_enqueue_script('magnific-popup-js',get_theme_file_uri('/assets/js/jquery.magnific-popup.min.js'),array('jquery'), 1.0, true);    
    wp_enqueue_script('magnific-popup-options-js',get_theme_file_uri('/assets/js/magnific-popup-options.js'),array('jquery'), 1.0, true);
    wp_enqueue_script('bootstrap-datepicker-js',get_theme_file_uri('/assets/js/bootstrap-datepicker.js'),array('jquery'), 1.0, true);
    wp_enqueue_script('timepicker-js',get_theme_file_uri('/assets/js/jquery.timepicker.min.js'),array('jquery'), 1.0, true);
    wp_enqueue_script('stellar-js',get_theme_file_uri('/assets/js/jquery.stellar.min.js'),array('jquery'), 1.0, true);    
    wp_enqueue_script('easing-js',get_theme_file_uri('/assets/js/jquery.easing.1.3.js'),array('jquery'), 1.0, true);
    wp_enqueue_script('aos-js', get_theme_file_uri('/assets/js/aos.js'),array('jquery'),1.0, true);    
    wp_enqueue_script('meal-maps','//maps.googleapis.com/maps/api/js?key=AIzaSyCjEmNUSFM03ofZueAyft6pMa9U7u7d1rU',null, 1.0, true);
    
    wp_enqueue_script('imagesloaded-js',get_theme_file_uri('/assets/js/imagesloaded.js'),array('jquery'), 1.0, true);
    wp_enqueue_script('isotope-pkgd-js',get_theme_file_uri('/assets/js/isotope.pkgd.min.js'),array('jquery'), 1.0, true);
    wp_enqueue_script('isotope-js',get_theme_file_uri('/assets/js/jquery.isotope.js'),array('jquery'), 1.0, true);
    wp_enqueue_script('portfolio-js',get_theme_file_uri('/assets/js/portfolio.js'),array('jquery','imagesloaded-js','magnific-popup-options-js','isotope-js','isotope-pkgd-js'), VERSION, true);
    wp_enqueue_script('meal-main-js',get_theme_file_uri('/assets/js/main.js'),array('jquery'), VERSION, true);    
}
add_action('wp_enqueue_scripts','meal_theme_assets');

//Class 25.7
function meal_codestar_init(){
    CSFramework_Metabox::instance(array());
}
add_action('init','meal_codestar_init');
//End Class 25.7

//Class 25.10 featured.php
function get_recipe_category($recipe_id){
    $terms = wp_get_post_terms($recipe_id,"category");
    if($terms){
        $first_term = array_shift($terms);
        return $first_term->name;
    }
    return "Food";
}

//End of Class 25.10

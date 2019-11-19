<?php
//add tgm file
require_once get_theme_file_path() . '/inc/tgm.php'; //class 16.4
//require_once get_theme_file_path() . '/inc/acf-mb.php'; //class 17.1
require_once get_theme_file_path() . '/inc/cmb2-mb.php'; //class 17.2

//class 5.11 attachments plugin
if(class_exists("Attachments")){
	//die();
	require_once("lib/attachments.php");	
}

//Classs 3.23 CACHE CLEANING FROM LOCAL SITE
//die(site_url()=="http://hellodolly.local");
if(site_url()== "http://hellodolly.local"){
	define("VERSION",time());
} else {
	define("VERSION",wp_get_theme()->get("Version"));
}

/*
echo VERSION;
die();
*/

if(!function_exists("alpha_bootstrapping")){
	function alpha_bootstrapping(){
		load_theme_textdomain("alpha");
		add_theme_support("post-thumbnails");
		add_theme_support("title-tag");
		//Class 5.16 - Search Form
		add_theme_support( 'html5', array( 'search-form' ) );
		//Class 3.28
		$alpha_custom_header_details = array(
			'header-text'	=> true,
			'default-text-color' =>'#222',
			'width'	=> '1200',
			'height'	=> '600',
			'flex-height'	=> true,
			'flex-width'	=> true,
			);
		add_theme_support("custom-header", $alpha_custom_header_details); //Class - 3.27 & 3.28
		register_nav_menu("topmenu",__("Top Menu","alpha"));
		register_nav_menu("footermenu",__("Footer Menu","alpha"));
		 //class 3.29 add custom logo through customizer
		$alpha_custom_logo_defaults = array(
			'width' => '100',
			'height' => '100'
		);
		add_theme_support('custom-logo', $alpha_custom_logo_defaults); //class 3.29 add custom logo through customizer
		add_theme_support("custom-background");
		//Class 5.2
		add_theme_support("post-formats", array("audio","video","link","image","quote"));

		//Class 6.3
	//	add_image_size("alpha-square",400,400,true); //center center
	//	add_image_size("alpha-portrait",400,9999);
	//	add_image_size("alpha-landscape",800,400);
	//	add_image_size("alpha-landscape-hard-cropped",600,400);

		//Class 6.5
		add_image_size("alpha-square-new",400,400,true); // center center hard crop
		add_image_size("alpha-square-new1",401,401,array("left", "top")); // cropped from left & top
		add_image_size("alpha-square-new2",500,500,array("center", "center")); // cropped from center center
		add_image_size("alpha-square-new3",600,600,array("right", "center")); // cropped from right & center
	}
	add_action("after_setup_theme","alpha_bootstrapping");	
}



function alpha_assets(){
	wp_enqueue_style("bootstrap",get_stylesheet_directory_uri()."/assets/css/bootstrap-4.0.min.css", null, VERSION);
	wp_enqueue_style("bootstrap","//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
	wp_enqueue_style("featherlight",get_stylesheet_directory_uri()."/assets/css/featherlight.min.css", NULL, VERSION);
	wp_enqueue_style("dashicons"); //class 5.2
	wp_enqueue_style("tns-style","//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/tiny-slider.css"); //class 5.11
    wp_enqueue_style("fontawesome", "//stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"); //Class 17.7
	wp_enqueue_style("alpha",get_stylesheet_uri(), NULL, VERSION);
	
	wp_enqueue_script("featherlight-js", get_theme_file_uri()."/assets/js/featherlight.min.js",array("jquery"), VERSION, true);
	//wp_enqueue_script("featherlight", get_template_directory_uri()."/featherlight.min.js",array("jquery"),"0.0.1", true);
	wp_enqueue_script("alpha-tns-js", "//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js", null, VERSION, true);
	wp_enqueue_script("alpha-main", get_theme_file_uri()."/assets/js/main.js", array("jquery","featherlight-js"), VERSION, true);
}
add_action("wp_enqueue_scripts", "alpha_assets");

function alpha_sidebar(){
	register_sidebar(
		array(
			'name'	=> __('Single Post Sidebar','alpha'),
			'id'	=> 'sidebar-1',
			'description'	=> __('Right Sidebar','alpha'),
			'before_widget'	=> '<section id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</section>',
			'before_title'	=> '<h4 class="widget_title">',
			'after_title'	=> '</h4>',
		)
	);
	
	register_sidebar(
		array(
			'name'	=> __('Footer Left Sidebar','alpha'),
			'id'	=> 'footer-left',
			'description'	=> __('Widget Area on the Footer Left','alpha'),
			'before_widget'	=> '<section id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</section>',
			'before_title'	=> '',
			'after_title'	=> '',
		)
	);
	
	register_sidebar(
		array(
			'name'	=> __('Footer Right Sidebar','alpha'),
			'id'	=> 'footer-right',
			'description'	=> __('Widget Area on the Footer Right','alpha'),
			'before_widget'	=> '<section id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</section>',
			'before_title'	=> '<h4 class="widget_title">',
			'after_title'	=> '</h4>',
		)
	);
}
add_action("widgets_init","alpha_sidebar");


function alpha_excerpt($excerpt){
	if(!post_password_required()){
		return $excerpt;
	} else {
		echo get_the_password_form();
	}
}
add_filter("the_excerpt","alpha_excerpt");


function alpha_protected_title_change(){
	return "%s";
}
add_filter("protected_title_format","alpha_protected_title_change");


function alpha_menu_item_class($classes, $item){
	$classes[] ="list-inline-item";
	return $classes;
}
add_filter('nav_menu_css_class','alpha_menu_item_class', 10, 2);
//add_filter( 'nav_menu_css_class' , 'wpdocs_channel_nav_class' , 10, 4 );

//Avoiding unnecessary inline styles class 3.26
function alpha_about_page_template_banner(){
	if(is_page()){
	  $alpha_fet_image = get_the_post_thumbnail_url(null, "large");
		?>
		<style>
		/*Our style goes here*/
		.page-header{
			background-image: url(<?php echo $alpha_fet_image; ?>)
		}
		</style>
		<?php	
	}
	//Class 3.27 show image in header
	if(is_front_page()){
		if(current_theme_supports('custom-header')){
			?>
			<style>
				.header {
					background-image: url(<?php echo header_image(); ?>);
					background-size: cover;					
				}
				.header h1.heading a, h3.tagline{
					color: #<?php echo get_header_textcolor();?>;
					<?php 
					
					if(!display_header_text()){
						echo 'display: none;';
					}
					?>
				}
			</style>
			<?php
		}
	}
}
add_action("wp_head", "alpha_about_page_template_banner",11);

//Class 5.6 : Add / Remove Class with body_class()
function alpha_body_class($classes){
	unset($classes[array_search("custom-background", $classes)]);
	unset($classes[array_search("postid-48", $classes)]);
	$classes[] = "new-class";
	return $classes;
}
add_action("body_class","alpha_body_class");

//Class 5.6 : Add / Remove Class with post_class()
function alpha_post_class($classes){
	unset($classes[array_search("custom-background", $classes)]);
	unset($classes[array_search("format-audio", $classes)]);
	$classes[] = "new-class";
	return $classes;
}
add_action("post_class","alpha_post_class");

//Class 5.17
function alpha_search_highlight_results($text){
	if(is_search()){
		$pattern = 	'/('. join('|', explode(' ', get_search_query())).')/i';
		$text = preg_replace($pattern, '<span class = "search-highlight">\0</span>', $text);
	}
	return $text;
}
add_filter("the_content","alpha_search_highlight_results");
add_filter("the_excerpt","alpha_search_highlight_results");
add_filter("the_title","alpha_search_highlight_results");

//Class 6.6
//function alpha_image_src_set(){
//	return null;
//}
//add_filter("wp_calculate_image_srcset","alpha_image_src_set");

// OR
add_filter("wp_calculate_image_srcset","__return_null");

//class 9.12
function alpha_modify_main_query($wpq){
	if(is_home() && $wpq->is_main_query()){
		$wpq->set("post__not_in", array(44));
	}
}
add_action("pre_get_posts","alpha_modify_main_query");

//Class 17.3
function alpha_admin_assets($hook){
    if(isset($_REQUEST['post']) || isset($_REQUEST['post_id'])){
        $post_id = empty($_REQUEST['post_ID']) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }
    if("post.php" == $hook){
        $post_format = get_post_format($post_id);
        wp_enqueue_script("admin-js", get_theme_file_uri("/assets/js/admin.js"), array("jquery"), VERSION, true);
        wp_localize_script("admin-js", "alpha_pf", array("format" => $post_format));
        
    }
}
add_action("admin_enqueue_scripts", "alpha_admin_assets");
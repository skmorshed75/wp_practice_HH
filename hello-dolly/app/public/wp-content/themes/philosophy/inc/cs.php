<?php

//Class 24.2 Codestar Framework
define( 'CS_ACTIVE_FRAMEWORK', false ); // default true
define( 'CS_ACTIVE_METABOX', true ); // default true
define( 'CS_ACTIVE_TAXONOMY',false ); // default true
define( 'CS_ACTIVE_SHORTCODE',false ); // default true
define( 'CS_ACTIVE_CUSTOMIZE', false ); // default true

//Show the metabox in edit mode
function philosophy_csf_metabox(){
	CSFramework_Metabox::instance(array());
}
add_action('init', 'philosophy_csf_metabox');


function philosophy_page_metabox($options){
    //Class 24.4
    $page_id = 0;
    //SEARCH CURRENT ID
    if(isset($_REQUEST['post']) || isset($_REQUEST['post_ID'])){
        $page_id = empty($_REQUEST['post_ID']) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }
    
    $current_page_template = get_post_meta($page_id,'_wp_page_template', true);
    
    //if('about.php' != $current_page_template)
    //If not about or contact page then exit
    if(!in_array($current_page_template,array('about.php','contact.php'))){
        return $options;        
    };
    //echo $current_page_template;
    //die();
    //wp_die();    
    //End of Class 24.4
    $options[] = array(
        'id'        => 'page-metabox',
        'title'     => __( 'Page Meta Info', 'philosophy' ),
        'post_type' => 'page',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array(
                'name'   => 'page-section1',
                'title'  => __( 'Page Settings', 'philosophy' ),
                'icon'   => 'fa fa-image',
                'fields' => array(
                    array(
                        'id'      => 'page-heading',
                        'type'    => 'text',
                        'title'   => __( 'Page Heading', 'philosophy' ),
                        'default' => __( 'Page Heading', 'philosophy' ),
                    ),
                    array(
                        'id' => 'page-teaser',
                        'title' => __('Teaser Text','philosophy'),
                        'type' => 'textarea',
                        'default' => __('Treaser Text', 'philosophy')
                    ),
                    array(
                        'id' => 'is-favourite',
                        'title' => __('Is Favourite', 'philosophy'),
                        'type' => 'switcher',
                        'default' => 1                        
                    ),
                    
                    //Class 24.3
                    array(
                        'id' => 'is-favourite-extra',
                        'title' => __('Extra Check', 'philosophy'),
                        'type' => 'switcher',
                        'default' => 0
                    ),
                    array(
                        'id' => 'page-favourite-text',
                        'title' => __('Page Favourite Text', 'philosophy'),
                        'type' => 'text',
                        'dependency' => array('is-favourite|is-favourite-extra','==|==','1|1' )
                    ),
                    array(
                        'id' => 'support-language',
                        'type' => 'checkbox',
                        'title' => __('Languages', 'philosophy'),
                        'options' => array(
                            'bangla' => 'Bangla',
                            'english' => 'English',
                            'french' => 'French'
                        ),
                        'attributes' => array(
                            'data-depend-id' => 'support-language'
                        )                        
                    ),
                    array(
                        'id' => 'extra-language-data',
                        'type' => 'text',
                        'title' => __('Extra Data','philosophy'),
//                        'dependency' => array('support-language_bangla|support-language_english','==|==','1|1')
                        'dependency' => array('support-language','any','bangla,english')
                    )
                    //End Class 24.3
                )
            ),
            array(
                'name'   => 'page-section2',
                'title'  => __( 'Extra Page Settings', 'philosophy' ),
                'icon'   => 'fa fa-book',
                'fields' => array(
                    array(
                        'id'      => 'page-heading2',
                        'type'    => 'text',
                        'title'   => __( 'Page Heading', 'philosophy' ),
                        'default' => __( 'Page Heading', 'philosophy' ),
                    ),
                    array(
                        'id' => 'page-treaser2',
                        'title' => __('Treaser Text','philosophy'),
                        'type' => 'textarea',
                        'default' => __('Treaser Text', 'philosophy')
                    ),
                    array(
                        'id' => 'is-favourite2',
                        'title' => __('Is Favourite', 'philosophy'),
                        'type' => 'switcher',
                        'default' => 1                        
                    )
                )
            ),
        )
              
    );
    return $options;
}
add_filter('cs_metabox_options','philosophy_page_metabox');

//Class 24.5
function philosophy_upload_metabox($options){
    $options[] = array(
        'id'        => 'page-upload-metabox',
        'title'     => __( 'Upload Files', 'philosophy' ),
        'post_type' => 'page',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array(
                'name'   => 'page-section1',
                'title'  => __( 'Page Settings', 'philosophy' ),
                'icon'   => 'fa fa-image',
                'fields' => array(
                    array(
                        'id'      => 'page-upload',
                        'type'    => 'upload',
                        'title'   => __( 'Upload File', 'philosophy' ),
                        'settings' => array(
                            'upload_type' => 'application/pdf',
                            //'upload_type' => 'video/mp4',
                            //'upload_type' => 'image/jpg',
                            'button_title' => __('Upload', 'philosophy'),
                            'frame_title' => __('Select a PDF File', 'philosophy'),
                            'insert_title' => __('Use this Use this PDF', 'philosophy'),     
                        ),
                    ), 
                    array(
                        'id'      => 'page-image',
                        'type'    => 'image',
                        'title'   => __( 'Upload Image', 'philosophy' ),
                        'add_title' => __("Add an Image","philosophy"),
                    ),                                        
                )
            ),
        )              
    );
    return $options;
}
add_filter('cs_metabox_options','philosophy_upload_metabox');
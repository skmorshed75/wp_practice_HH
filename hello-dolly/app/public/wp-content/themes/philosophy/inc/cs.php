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
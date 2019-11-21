<?php

//Class 24.2 Codestar Framework
define( 'CS_ACTIVE_FRAMEWORK', true ); // default true
define( 'CS_ACTIVE_METABOX', true ); // default true
define( 'CS_ACTIVE_TAXONOMY', true ); // default true
define( 'CS_ACTIVE_SHORTCODE', true ); // default true
define( 'CS_ACTIVE_CUSTOMIZE', false ); // default true

function philosophy_page_metabox($options){
    $options[] = array(
        'id' => 'page-metabox',
        'title' => __('Page Meta Info','philosophy'),
        'post_type' => 'page',
        'context' => 'normal',
        'priority' => 'default',
        'sections' => array(
            array(
                'name' => 'page-section1',
                'title' => __('Page Settings','philosophy'),
                'icon' => 'fa fa-image',
                'fields' => array(
                    array(
                        'id' => 'page-heading',
                        'type' => 'text',
                        'default' => __('Page Heading', 'philosophy')
                    ),
                    array(
                        'id' => 'page-treaser',
                        'type' => 'textarea',
                        'default' => __('Treaser Text', 'philosophy')
                    ),
                    array(
                        'id' => 'is-favourite',
                        'type' => 'switcher',
                        'default' => 1                        
                    ),
                )
            )
        )
    );
    return $options;
}
add_filter('cs_metabox_options','philosophy_page_metabox');
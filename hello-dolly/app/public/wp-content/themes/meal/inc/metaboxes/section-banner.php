<?php
//Class 25.9
function meal_banner_section_metabox($metaboxes){
    $meal_section_id = 0;
    

    if(isset($_REQUEST['post']) || isset($_REQUEST['post_ID'])){
        $meal_section_id = empty($_REQUEST['post_ID']) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }
//echo get_post_type($meal_section_id);
    //Class 25.10
    if('section' != get_post_type($meal_section_id)){
        return $metaboxes;
    }  
        
    //echo $meal_section_id;    
    //End Class 25.10    
	$section_meta = get_post_meta($meal_section_id,'meal-section-type',true);
	$section_type = $section_meta['type'];
    
//    $section_meta = get_post_meta($meal_section_id, 'meal-section-type',true);
//    $section_type = $section_meta['type'];
    if('banner' !=$section_type ){
        return $metaboxes;
    }
    $metaboxes[] = array(
        'id' => 'meal-section-banner',        
        'title'=>__('Banner Settings','meal'),
        'post_type'=>'section',
        'context'=>'normal',
        'priority'=>'default',
        'sections'=>array(
            array(
                'id'=>'meal-banner-section-one',
                'name' => '',
                'icon'=>'fa fa-book',
                'fields'=>array(
                    array(
                        'id'=>'banner_image',
                        'title'=>__('Banner Image','meal'),
                        'type'=>'image',
                    ),
                    array(
                        'id'=>'button_title',
                        'title'=>__('Button Title','meal'),
                        'type'=>'text',
                    ),
                    array(
                        'id'=>'button_target',
                        'title'=>__('Button Target','meal'),
                        'type'=>'text',
                    )
                ),            
            )
        ),        
    );
    
    return $metaboxes;
}
add_filter('cs_metabox_options','meal_banner_section_metabox');
?>
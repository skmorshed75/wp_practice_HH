<?php
//Class 25.11
function meal_gallery_section_metabox($metaboxes){
    $meal_section_id = 0;


    if(isset($_REQUEST['post']) || isset($_REQUEST['post_ID'])){
        $meal_section_id = empty($_REQUEST['post_ID']) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }
    //Class 25.10
    if('section' != get_post_type($meal_section_id)){
        return $metaboxes;
    }    
    
	$section_meta = get_post_meta($meal_section_id,'meal-section-type',true);
	$section_type = $section_meta['type'];
	if ('gallery' != $section_type) {
		return $metaboxes;
	}    
    
    
    $metaboxes[] = array(
        'id' => 'meal-section-gallery',
        'title'=>__('gallery Settings','meal'),
        'post_type'=>'section',
        'context'=>'normal',
        'priority'=>'default',
        'sections'=>array(
            array(
                'name'=>'meal-gallery-section-one',
                //'name' => '',
                'icon'=>'fa fa-book',
                'fields'=>array(
                    array(
                        'id'=>'portfolio',                        
                        'type'=>'group',
                        'title'=>__('Portfolio','meal'),
                        'button_title'=>__('New Image','meal'),
                        'accordion_title'=>__('Add New Image','meal'),
                        'fields' => array(
                            array(
                                'id'=>'title',
                                'type'=>'text',
                                'title'=>__('Title','meal'),
                            ),
                            array(
                                'id'=>'image',
                                'type'=>'image',
                                'title'=>__('Portfolio Image','meal'),
                            ),
                            array(
                                'id'=>'categories',
                                'title'=>__('Categories','meal'),
                                'type'=>'text',
                            )                        
                        )
                    ),
                ),            
            )
        ),        
    );
    
    return $metaboxes;
}
add_filter('cs_metabox_options','meal_gallery_section_metabox');
?>
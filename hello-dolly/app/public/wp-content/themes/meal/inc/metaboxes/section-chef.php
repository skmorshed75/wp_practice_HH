<?php
//Class 25.12
function meal_chef_section_metabox($metaboxes){
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
	if ('chef' != $section_type) {
		return $metaboxes;
	}    
    
    
    $metaboxes[] = array(
        'id' => 'meal-section-chef',
        'title'=>__('Chef Settings','meal'),
        'post_type'=>'section',
        'context'=>'normal',
        'priority'=>'default',
        'sections'=>array(
            array(
                'name'=>'meal-chef-section-one',
                //'name' => '',
                'icon'=>'fa fa-book',
                'fields'=>array(
                    array(
                        'id'=>'chefs',
                        'type'=>'group',
                        'title'=>__('Chefs','meal'),
                        'button_title'=>__('New Chef','meal'),
                        'accordion_title'=>__('Add New Chef','meal'),
                        'fields' => array(
                            array(
                                'id'=>'name',
                                'type'=>'text',
                                'title'=>__('Chef Name','meal'),
                            ),
                            array(
                                'id'=>'image',
                                'type'=>'image',
                                'title'=>__('Chef Image','meal'),
                            ),
                            array(
                                'id'=>'title',
                                'title'=>__('Chef Title','meal'),
                                'type'=>'text',
                            ),
                            array(
                                'id'=>'bio',
                                'title'=>__('Chef Biography','meal'),
                                'type'=>'textarea',
                            ),
                            array(
                                'id'=>'social_profiles',
                                'title'=>__('Social Profiles','meal'),
                                'type'=>'fieldset',
                                'fields'=> array(
                                    array(
                                        'id' => 'facebook',
                                        'title' => __('Facebook', 'meal'),
                                        'type' => 'text',
                                    ),
                                    array(
                                        'id' => 'twitter',
                                        'title' => __('Twitter', 'meal'),
                                        'type' => 'text',
                                    ),
                                    array(
                                        'id' => 'instagram',
                                        'title' => __('Instagram', 'meal'),
                                        'type' => 'text',
                                    ),
                                )
                            ),
                        )
                    ),
                ),            
            )
        ),        
    );
    
    return $metaboxes;
}
add_filter('cs_metabox_options','meal_chef_section_metabox');
?>
<?php

global $meal_section_id;
$meal_section_meta = get_post_meta( $meal_section_id,'meal-section-services',true );

//echo $meal_section_meta['services'];
//die();
    
    
$meal_section = get_post($meal_section_id);
$meal_section_title = $meal_section->post_title;
$meal_section_description = $meal_section->post_content;

?> 

<div class="section bg-white services-section" data-aos="fade-up">
    <div class="container">
        <div class="row section-heading justify-content-center mb-5">
            <div class="col-md-8 text-center">                     
                <h2 class="heading mb-3">
                    <?php echo esc_html($meal_section_title, 'meal'); ?>
                </h2>
                <?php
                    echo apply_filters('the_content', $meal_section_description);
                ?>
            </div>
        </div>
        <?php
        $meal_services = $meal_section_meta['services'];
        if($meal_services) :
        ?>
        <div class="row">
            <?php foreach($meal_services as $meal_service): ?>
            <div class="col-m mb-5d-6 col-lg-4" data-aos="fade-up">
                <div class="media feature-icon d-block text-center">
                    <div class="icon">
                        <span class="<?php echo esc_attr($meal_service['icon']); ?>"></span>
                    </div>
                    <div class="media-body">
                        <h3><?php echo esc_html($meal_service['name']); ?></h3>
                        <?php echo apply_filters('the_content',$meal_service['description']); ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</div> <!-- .section -->
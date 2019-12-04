

<?php
global $meal_section_id;
//$meal_section_meta = get_post_meta($meal_section_id,'meal-section-gallery',true);
$meal_section_meta = get_post_meta( $meal_section_id,'meal-section-gallery',true );

//echo $meal_section_meta['portfolio'];
//die();
    
    
$meal_section = get_post($meal_section_id);
$meal_section_title = $meal_section->post_title;
$meal_section_description = $meal_section->post_content;

?> 

<div class="section pb-3 bg-white" id="section-about" data-aos="fade-up">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12 col-lg-8 section-heading">
                <h2 class="heading mb-5">
                    <?php echo esc_html($meal_section_title,'meal'); ?>
                </h2>
                <?php echo apply_filters('the_content', $meal_section_description); ?>
            </div>
        </div>
    </div>
</div> <!-- .section -->
       
<?php
$meal_gallery_items = $meal_section_meta['portfolio'];
$meal_item_categories= [];

foreach($meal_gallery_items as $meal_gallery_item){
    $meal_gallery_item_categories = explode(",",$meal_gallery_item['categories']);
    foreach($meal_gallery_item_categories as $meal_gallery_item_category){
        $meal_gallery_item_category = trim($meal_gallery_item_category);
        if(!in_array($meal_gallery_item,$meal_item_categories)){
            array_push($meal_item_categories,$meal_gallery_item_category);
        }
    }
}
//print_r($meal_item_categories);
?>
        
<div class="section bg-white pt-2 pb-2 text-center" data-aos="fade">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <ul class="portfolio-filter text-center">
                        <li class="active"><a href="#" data-filter="*"> All</a></li>
                        <li><a href="#" data-filter=".cat1">Salad</a></li>
                        <li><a href="#" data-filter=".cat2">Bread</a></li>
                        <li><a href="#" data-filter=".cat3">Fish</a></li>
                        <li><a href="#" data-filter=".cat4">Meat</a></li>
                        <li><a href="#" data-filter=".cat5">Fruits</a></li>
                    </ul>
                </div>

                <div class="portfolio-grid portfolio-gallery grid-4 gutter">

                    <div class="portfolio-item cat2 cat3 cat4">
                        <a href="<?php echo get_template_directory_uri(); ?>/assets/imgs/img1.jpg" class="portfolio-image popup-gallery" title="Bread">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/img1.jpg" alt=""/>
                            <div class="portfolio-hover-title">
                                <div class="portfolio-content">
                                    <h4>Branding</h4>
                                    <div class="portfolio-category">
                                        <span>Cat 1</span>
                                        <span>Cat 2</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="portfolio-item cat2 cat3 cat4">
                        <a href="<?php echo get_template_directory_uri(); ?>/assets/imgs/img9.jpg" class="portfolio-image popup-gallery" title="Bread">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/img9.jpg" alt=""/>
                            <div class="portfolio-hover-title">
                                <div class="portfolio-content">
                                    <h4>Branding</h4>
                                    <div class="portfolio-category">
                                        <span>Cat 1</span>
                                        <span>Cat 2</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="portfolio-item cat1 cat2 cat3">
                        <a href="<?php echo get_template_directory_uri(); ?>/assets/imgs/img2.jpg" class="portfolio-image popup-gallery" title="Design">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/img2.jpg" alt=""/>
                            <div class="portfolio-hover-title">
                                <div class="portfolio-content">
                                    <h4>Design</h4>
                                    <div class="portfolio-category">
                                        <span>Cat 1</span>
                                        <span>Cat 2</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="portfolio-item cat1 cat4">
                        <a href="<?php echo get_template_directory_uri(); ?>/assets/imgs/img10.jpg" class="portfolio-image popup-gallery" title="Photography">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/img10.jpg" alt=""/>
                            <div class="portfolio-hover-title">
                                <div class="portfolio-content">
                                    <h4>Photography</h4>
                                    <div class="portfolio-category">
                                        <span>Cat 1</span>
                                        <span>Cat 2</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="portfolio-item cat3 cat5">
                        <a href="<?php echo get_template_directory_uri(); ?>/assets/imgs/img4.jpg" class="portfolio-image popup-gallery" title="Marketing">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/img4.jpg" alt=""/>
                            <div class="portfolio-hover-title">
                                <div class="portfolio-content">
                                    <h4>Marketing</h4>
                                    <div class="portfolio-category">
                                        <span>Cat 1</span>
                                        <span>Cat 2</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="portfolio-item cat4 cat5">
                        <a href="<?php echo get_template_directory_uri(); ?>/assets/imgs/img5.jpg" class="portfolio-image popup-gallery" title="Web Desgin">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/img5.jpg" alt=""/>
                            <div class="portfolio-hover-title">
                                <div class="portfolio-content">
                                    <h4>Web Design</h4>
                                    <div class="portfolio-category">
                                        <span>Cat 1</span>
                                        <span>Cat 2</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="portfolio-item cat2 cat3">
                        <a href="<?php echo get_template_directory_uri(); ?>/assets/imgs/img7.jpg" class="portfolio-image popup-gallery" title="Media">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/img7.jpg" alt=""/>
                            <div class="portfolio-hover-title">
                                <div class="portfolio-content">
                                    <h4>Media</h4>
                                    <div class="portfolio-category">
                                        <span>Cat 1</span>
                                        <span>Cat 2</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="portfolio-item cat3 cat4 cat5">
                        <a href="<?php echo get_template_directory_uri(); ?>/assets/imgs/img6.jpg" class="portfolio-image popup-gallery" title="Portfolio">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/img6.jpg" alt=""/>
                            <div class="portfolio-hover-title">
                                <div class="portfolio-content">
                                    <h4>Portfolio</h4>
                                    <div class="portfolio-category">
                                        <span>Cat 1</span>
                                        <span>Cat 2</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- .section -->


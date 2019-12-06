<?php
global $meal_section_id;
$meal_section_meta = get_post_meta( $meal_section_id,'meal-section-gallery',true );
$meal_section = get_post($meal_section_id);
$meal_section_title = $meal_section->post_title;
$meal_section_description = $meal_section->post_content;
?>



<div class="section pb-3 bg-white" id="<?php echo esc_attr($meal_section->post_name); ?>" data-aos="fade-up">
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-md-12 col-lg-8 section-heading">
        <h2 class="heading mb-5">
			<?php echo esc_html($meal_section_title) ; ?>
        </h2>
        <?php
        echo apply_filters( 'the_content', $meal_section_description );
        ?>
      </div>
    </div>
  </div>
</div> <!-- .section -->


<?php
$meal_gallery_items = $meal_section_meta['portfolio'];
$meal_items_categories = [];
$meal_number_of_images = $meal_section_meta['nimages'];
$meal_counter=0;
foreach ($meal_gallery_items as $meal_gallery_item) {
    if ($meal_counter>=$meal_number_of_images) {
            break;
    }
	$meal_gallery_item_categories = explode(',', $meal_gallery_item['categories']);
	foreach ($meal_gallery_item_categories as $meal_gallery_item_categorie) {        
		$meal_gallery_item_categorie = trim($meal_gallery_item_categorie);
		if (!in_array($meal_gallery_item_categorie, $meal_items_categories)) {
			array_push($meal_items_categories, $meal_gallery_item_categorie);
		}
	}
    $meal_counter++;
	
}
?>


<!-- PORTFIOLIO AREA START -->
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <ul class="portfolio-filter">
                <li data-filter="*" class="active"><?php _e( 'All','meal' ) ?></li>
                
                <?php
                foreach ($meal_items_categories as $meal_items_category) :
                ?>
                <li data-filter=".<?php echo esc_attr($meal_items_category); ?>"><?php echo esc_html($meal_items_category); ?></li>

                <?php
                endforeach;
                ?>
                
            </ul>
        </div>
    </div>

    <div class="row portfolio-list" data-images="<?php echo esc_attr($meal_number_of_images); ?>">

		<?php
        $meal_counter=0;
		foreach ($meal_gallery_items as $meal_gallery_item) :
            if ($meal_counter>=$meal_number_of_images) {
                break;
            }
			$meal_item_class = str_replace(","," ", $meal_gallery_item['categories']);
			$meal_item_image_id = $meal_gallery_item['image'];
			$meal_item_thumbnail = wp_get_attachment_image_src($meal_item_image_id,'medium');
			$meal_item_categories_array = explode(",",$meal_gallery_item['categories']);
		?>

        <div class="col-md-4 <?php echo esc_attr($meal_item_class); ?>">
            <div class="single-portfolio-item" style="background-image: url(<?php echo esc_url($meal_item_thumbnail[0]) ; ?>);">
                <div class="portfolio-hover">
                    <div class="portfolio-hover-table">
                        <div class="portfolio-hover-tablecell">
                            <h4><?php echo esc_html($meal_gallery_item['title']) ?></h4>
                            <?php
                            foreach ($meal_item_categories_array as $meal_item_categorie) :
                            printf("<span>%s </span>",trim($meal_item_categorie));
                            endforeach;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    	<?php
            $meal_counter++;
	    	endforeach;
	    ?>


    </div>

    <div class="row">
        <div class="col-md-12 text-center">
            <div class="button-gallery">
                <button id="loadmorep"><?php _e('Load More','meal'); ?></button>
            </div>
        </div>
    </div>
</div>
<!-- PORTFIOLIO AREA END -->
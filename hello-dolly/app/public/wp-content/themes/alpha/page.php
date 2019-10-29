<?php get_header(); ?>
<body <?php body_class() ?>>
<?php get_template_part("/template-parts/common/hero"); ?>

<div class="container">
	<?php if(is_front_page()){?>
		<div class="col-md-8 offset-md-2">
			<?php 
			if(class_exists('Attachments')):
			?>
				<h2 class = "text-center"><?php _e("Testimonial Section","alpha"); ?></h2>
			<?php
			endif;
			?>
			<div class="testimonials slider text-center">							
				<?php
				if(class_exists('Attachments')){
					$attachments = new Attachments("testimonials", 56);
					if($attachments->exist()){
						while($attachment = $attachments->get()){
							?>
							<div>
								<?php echo $attachments->image("thumbnail"); ?>
								<h4><?php echo esc_html($attachments->field('name')); ?></h4>
								<p><?php echo esc_html($attachments->field('testimonial')); ?></p>
								<p>
									<?php echo esc_html($attachments->field("position")); ?>,
									<strong><?php echo esc_html($attachments->field("company")); ?></strong>	
								</p>

							</div>							
							<?php
						}
					}
				}
				?>							
			</div>
		</div>
	<?php }?>
</div>
<div class="posts">
   <?php 
	while(have_posts()):
		the_post();
		?>
		<div class="post"<?php post_class() ?>> 
			<div class="container">
				<div class="row">
					<div class="col-md-10 offset-md-1">
						<h2 class="post-title text-center">
							<?php the_title(); ?>
						</h2>
					</div>
				</div>
				<div class="text-center">
					<p>
						<em><?php the_author_posts_link(); ?></em><br/>
						<?php echo get_the_date("d/m/Y"); ?>
					</p>
				</div>					
				<div class="row">
					<div class="col-md-10 offset-md-1 text-center">
						<p>
							<?php
							if(has_post_thumbnail()):
								$thumbnail_url = get_the_post_thumbnail_url(null, "large");
								//echo '<a href="'.$thumbnail_url.'" data-featherlight="image">';
								printf('<a href="%s" data-featherlight="image">',$thumbnail_url);
								the_post_thumbnail("large", array("class=>'img-fluid'"));
								echo '</a>';
							endif;
							?>
							<?php
							the_content();

							?>
						</p>
					</div>
				</div>
			</div>
		</div>						
	<?php
	endwhile;
	?>

</div>


<?php get_footer(); ?>
<?php get_header(); ?>
<body <?php body_class() ?>>
<?php get_template_part("/template-parts/common/hero"); ?>
<div class="posts">
   <?php
		if(!have_posts() && is_search()){
		?>
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-3">
					<div class="search-msg alert alert-warning text-center">
						<h4>
							<?php echo _e("Your searched items not found.","alpha");?>
						</h4>						
					</div>
				</div>
			</div>
		</div>						
		<?php	
		}
		while(have_posts()){
			the_post();
			get_template_part("post-formats/content", get_post_format()); //Class 5.3
		}
		?>
	<div class="container post-pagination">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-8">
				<?php
				the_posts_pagination(array(
					"screen_reader_text"=>' ',
					"prev_text" => "New Posts",
					"next_text" => "Old Posts"
				));
				?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
<?php get_header(); ?>
<body <?php body_class() ?>>
<?php get_template_part("/template-parts/common/hero"); ?>
<div class="posts text-center">
  	<h2>
  		Posts under : <?php single_tag_title(); ?>
  	</h2>
   <?php 
	while(have_posts()){
		the_post();
		?>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php
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
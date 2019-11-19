
<?php
/*
Template Name: Custom Query WPQuery
*/
?>

<?php get_header(); ?>
<body <?php body_class() ?>>
<?php get_template_part("/template-parts/common/hero"); ?>
<div class="posts text-center">
   <?php 
	$paged = get_query_var("paged")?get_query_var("paged"):1;
	$posts_per_page = 2;
	$post_ids = array(44,146,12,31,32,20,17);
	//$total = 3;
	$_p = new WP_Query(array(		
		'posts_per_page'	=> $posts_per_page,
		'paged'	=> $paged,
		'meta_query'	=> array(
			'relation'	=> 'AND',
			array(
				'key'	=> 'featured',
				'value'	=> '1',
				'compare'	=> '='
			),
			array(
				'key'	=> 'homepage',
				'value'	=> '1',
				'compare'	=> '='
			),
		)
	));
	while ($_p->have_posts()){
		$_p->the_post();
		?>
		<h2>
			<a href="<?php the_permalink(); ?>"><?php the_title();?></a>
		</h2>
		<?php
	}
	wp_reset_query();
	?>
	<div class="container post-pagination">
		<div class="row">
			<div class="col-md-12">
				<?php
				echo paginate_links(array(
					'total'	=> $_p->max_num_pages,
					'current'	=> $paged,
					//'prev_next'	=> true,
					'prev_text'	=>__('Old Posts','alpha'),
					'next_text'	=>__('New Posts','alpha'),
				));
				?>
			</div>
		</div>
	</div>	
</div>
<?php get_footer(); ?>

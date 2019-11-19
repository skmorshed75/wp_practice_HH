
<?php
/*
Template Name: Custom Query
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
	$total = 3;
	$_p = get_posts(array(
		'post__in'	=> $post_ids,
		//'orderby'	=> 'post__in',
		//'author__in'	=> array(2),
		'numberposts'	=> $total,
		'posts_per_page'	=> $posts_per_page,
		'paged'	=> $paged,
		//'order'	=> 'asc',
	));

	foreach($_p as $post){
		//setup_postdata($post);
		//echo '<pre>';
		//print_r($post);
		//echo '</pre>';
		?>
		<h2>
			<a href="<?php echo esc_url($post->guid); ?>">
				<?php			
				echo apply_filters("the_title",$post->post_title);
				?>
			</a>
		</h2>
		<?php
	}
	//wp_reset_postdata();
	?>
	<div class="container post-pagination">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-8">
				<?php
				echo paginate_links(array(
					'total'	=> ceil($total/$posts_per_page)
				));
				?>
			</div>
		</div>
	</div>	
</div>
<?php get_footer(); ?>

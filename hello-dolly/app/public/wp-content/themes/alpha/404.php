<h2>404</h2>
<?php get_header(); ?>

<body <?php body_class(); ?>>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center errorview">
					<?php
						_e("Sorry! we couldn't find what u r looking for","alpha");
					?>
				</h1>
			</div>
		</div>
	</div>
</body>


<?php get_footer(); ?>
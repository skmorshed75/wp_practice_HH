<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            	<?php if(current_theme_supports("custom-logo")):
					?>
					<div class="logo text-center">
						<a href=""><?php the_custom_logo(); ?></a>
					</div>
					<?php
				endif; ?>
                <h3 class="tagline">
                	<?php bloginfo("description"); ?>
                </h3>
                <h1 class="align-self-center display-1 text-center heading">
                	<a href="<?php echo site_url(); ?>"><?php bloginfo("name"); ?></a>
                </h1>
            </div>
            <div class="col-md-12">
            	<div class="navigation">
            		<?php
					wp_nav_menu(
						array(
							'theme_location' =>'topmenu',							
							'menu_id'	=> 'topmenucontainer',
							'menu_class'	=> 'list-inline text-center'
						)
					);
            	    
					?>
            	</div>
            </div>
        </div>
<!--        Class 5.15-->
        <div class="row">
        	<div class="col-md-12">
        		<div class="search_form text-center">
        			<?php
					if(is_search()){
					?>
						<h4>
							<?php _e("You searched for","alpha"); ?>: <?php the_search_query(); ?>
						</h4>
					<?php	
					}
					?>
					
					<?php
					echo get_search_form();
					?>
        		</div>
        	</div>
        </div>
    </div>
</div>

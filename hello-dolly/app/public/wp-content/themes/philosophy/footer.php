   <!-- s-extra
    ================================================== -->
    <section class="s-extra">

        <div class="row top">

            <div class="col-eight md-six tab-full popular">
                <h3><?php _e("Popular Posts","philosophy") ?></h3>

                <div class="block-1-2 block-m-full popular__posts">
                   <?php
                    $philosophy_popular_posts = new WP_Query(array(
                        'posts_per_page' => 6,
                        'ignore_sticky_posts' => 1,
                        'orderby'   => 'comment_count',
                    ));
                    
                    while ($philosophy_popular_posts->have_posts()){
                        $philosophy_popular_posts->the_post();
                        ?>
                        <article class="col-block popular__post">
                            <a href="<?php the_permalink(); ?>" class="popular__thumb">
                                <?php the_post_thumbnail(); ?>
                            </a>
                            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <section class="popular__meta">
                                    <span class="popular__author"><span><?php esc_html("By","philosophy"); ?></span> <a href="<?php echo esc_html(get_author_posts_url(get_the_author_meta("ID"))); ?>"><?php the_author(); ?></a></span>
                                <span class="popular__date"><span><?php esc_html("on", "philosophy"); ?></span> <time datetime="2017-12-19"><?php echo get_the_date(); ?></time></span>
                            </section>
                        </article>                            
                        <?php
                    }
                    wp_reset_query();
                    ?>
                    
                </div> <!-- end popular_posts -->
            </div> <!-- end popular -->
            
            <div class="col-four md-six tab-full about">
               <?php
                if(is_active_sidebar('before-footer-right')){
                    dynamic_sidebar('before-footer-right');
                }
                
                ?>

            </div> <!-- end about -->

        </div> <!-- end row -->

        <div class="row bottom tags-wrap">
            <div class="col-full tags">
               
                <?php
                $philosophy_footer_tag_heading = apply_filters('philosophy_footer_tag_heading',__('Tags','philosophy'));
                $philosophy_footer_tag_items = apply_filters('philosophy_footer_tag_items',get_tags());
                ?>
                <h3><?php echo esc_html($philosophy_footer_tag_heading); ?></h3>

                <div class="tagcloud">
                    <?php 
                    //print_r($philosophy_footer_tag_items);
                    if(is_array($philosophy_footer_tag_items)){
                        foreach($philosophy_footer_tag_items as $pti){
                            printf('<a href="%s">%s</a>', get_term_link($pti->term_id), $pti->name);
                        }
                    }
                    ?>
                </div> <!-- end tagcloud -->
            </div> <!-- end tags -->
        </div> <!-- end tags-wrap -->

    </section> <!-- end s-extra -->


    <!-- s-footer
    ================================================== -->
    <footer class="s-footer">

        <div class="s-footer__main">
            <div class="row">
                
                <div class="col-two md-four mob-full s-footer__sitelinks">
                        
                    <h4><?php _e("Quick Links", "philosophy"); ?></h4>
                    
                    <?php
                    wp_nav_menu(array(
                        "theme_location"    => 'footer_left_menu',
                        'menu_id'    => 'footer_left',
                        'menu_class'    => 's-footer__linklist',
                    ));
                    ?>

                </div> <!-- end s-footer__sitelinks -->

                <div class="col-two md-four mob-full s-footer__archives">
                        
                    <h4><?php _e("Archives","philosophy"); ?></h4>
                    
                    <?php
                    wp_nav_menu(array(
                        "theme_location"    => 'footer_middle_menu',
                        "menu_id"   => 'footer_middle',
                        'menu_class'    => 's-footer__linklist',
                    ));
                    ?>

                </div> <!-- end s-footer__archives -->

                <div class="col-two md-four mob-full s-footer__social">
                        
                    <h4><?php _e("Social", "philosophy"); ?></h4>
                    <?php
                    wp_nav_menu(array(
                        'theme_location'    => 'footer_right_menu',
                        'menu_id'   => 'footer_right',
                        'menu_class'    => 's-footer__linklist',
                    ));
                    ?>

                </div> <!-- end s-footer__social -->

              
                    <?php 
                    //Our Newsletter
                    if(is_active_sidebar("footer-right")){
                        dynamic_sidebar("footer-right");
                    }
                    ?>              
               
                <div class="col-five md-full end s-footer__subscribe">
                    <div class="subscribe-form">
                        <form id="mc-form" class="group" novalidate="true">

                            <input type="email" value="" name="EMAIL" class="email" id="mc-email" placeholder="Email Address" required="">
                
                            <input type="submit" name="subscribe" value="Send">
                
                            <label for="mc-email" class="subscribe-message"></label>
                
                        </form>
                    </div>

                </div> <!-- end s-footer__subscribe -->

            </div>
        </div> <!-- end s-footer__main -->

        <div class="s-footer__bottom">
            <div class="row">
                <div class="col-full">
                    <div class="s-footer__copyright">
                       <?php
                        if(is_active_sidebar("footer-bottom")){
                            dynamic_sidebar("footer-bottom");
                        }
                        ?>
<!--
                        <span>© Copyright Philosophy 2018</span> 
                        <span>Site Template by <a href="https://colorlib.com/">Colorlib</a></span>
-->
                    </div>

                    <div class="go-top">
                        <a class="smoothscroll" title="Back to Top" href="#top"></a>
                    </div>
                </div>
            </div>
        </div> <!-- end s-footer__bottom -->

    </footer> <!-- end s-footer -->


    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader">
            <div class="line-scale">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <?php wp_footer(); ?>
</body>

</html>
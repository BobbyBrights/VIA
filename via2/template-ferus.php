<?php

/*
 * Template name: Ferus
 */


global $avia_config;

  /*
   * get_header is a basic wordpress function, used to retrieve the header.php file in your theme directory.
   */
   get_header();


   if( get_post_meta(get_the_ID(), 'header', true) != 'no') echo avia_title();
   ?>

    <div class='container_wrap container_wrap_first main_color <?php avia_layout_class( 'main' ); ?>'>

      <div class='container' id="ferus">

        <main class='template-page content  <?php avia_layout_class( 'content' ); ?> units' <?php avia_markup_helper(array('context' => 'content','post_type'=>'page'));?>>

                            <div class="two_col">
                              <img src="<?php bloginfo('url'); ?>/wp-content/themes/via2/images/layout/ferus_logo.png" />
                              <?php echo get_field('ferus_description'); ?>
                            </div>

                            <div class="one_col">
                                <?php dynamic_sidebar('homepage'); ?>
                            </div>

                            <div class="three_col">
                            <?php
                              $ferus_args = array( 'category_name' => 'ferus-posts', 'order' => 'ASC', 'posts_per_page' => -1 );
                              $ferus = new WP_Query( $ferus_args );

                              if ( $ferus->have_posts() ) : while ( $ferus->have_posts() ) : $ferus->the_post(); ?>

                            <div id="ferus_<?php the_title(); ?>" class="ferus_section">
                              <h1 class="ferus_section_title"><?php the_title(); ?></h1>
                              <?php the_content(); ?>
                            </div>

                            <?php endwhile; endif; wp_reset_query(); ?>
                            </div>

                            <div class="four_col" id="year_selector">
                            <?php if ( $ferus->have_posts() ) : while ( $ferus->have_posts() ) : $ferus->the_post(); ?>
                              <button data-target="ferus_<?php the_title(); ?>" class="ferus_section_trigger"><?php the_title(); ?></button>
                            <?php endwhile; endif; wp_reset_query(); ?>
                            </div>

                            <script type="text/javascript">
                            var $ = jQuery;

                            $(function(){
                                $('.ferus_section_trigger').each(function(){
                                  $(this).on('click', function(){
                                    var dataTarget = $(this).attr('data-target')
                                    $('.ferus_section').each(function(){
                                      if( $(this).attr('id') !== dataTarget ) {
                                        $(this).hide()
                                      } else if ( $(this).attr('id') == dataTarget ) {
                                        $(this).show()
                                      }
                                    })
                                  })
                                })
                            })
                            </script>


                    <?php
                    /* Run the loop to output the posts.
                    * If you want to overload this in a child theme then include a file
                    * called loop-page.php and that will be used instead.
                    */

                    $avia_config['size'] = avia_layout_class( 'main' , false) == 'entry_without_sidebar' ? '' : 'entry_with_sidebar';
                    get_template_part( 'includes/loop', 'page' );
                    ?>

        <!--end content-->
        </main>

      </div><!--end container-->

    </div><!-- close default .container_wrap element -->

<?php get_footer(); ?>
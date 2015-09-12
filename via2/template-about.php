<?php

/*
 * Template name: About
 */

global $avia_config;

	/*
	 * get_header is a basic wordpress function, used to retrieve the header.php file in your theme directory.
	 */
	 get_header();


 	 if( get_post_meta(get_the_ID(), 'header', true) != 'no') echo avia_title();
	 ?>

		<div class='container_wrap container_wrap_first main_color <?php avia_layout_class( 'main' ); ?>'>

			<div class='container' id="about">

				<div class="two_col">
					<div class="VIA_calendar">
						<p class="VIA_calendar_title">Calendar</p>
						<ul class="VIA_calendar_entries">
						<?php

							$VIA_calendar_args = array( 'post_type' => 'post', 'category_name' => 'calendar', 'posts_per_page' => -1 );
							$VIA_calendar_posts = get_posts( $VIA_calendar_args );

							foreach ( $VIA_calendar_posts as $post ) : setup_postdata( $post );

								$event_date = new DateTime( get_field( 'event_date' ) );
								$event_time = get_field( 'event_time' );
								$event_location = get_field( 'event_location' );
								$event_link = get_field( 'event_link' ); ?>
							<li>
								<span class="VIA_calendar_date"><?php echo $event_date->format('F j Y'); ?></span>
								<span class="VIA_calendar_time"><?php echo $event_time; ?></span>
								<span class="VIA_calendar_title"><?php the_title(); ?></span>
								<span class="VIA_calendar_location"><?php echo $event_location; ?></span>
								<span class="VIA_event_link"><?php echo $event_link; ?></span>
							</li>
						<?php endforeach; wp_reset_postdata(); ?>
						</ul>
					</div>
					<?php echo get_field('VIA_description'); ?>
				</div>

				<main class='two_col template-page content  <?php avia_layout_class( 'content' ); ?> units' <?php avia_markup_helper(array('context' => 'content','post_type'=>'page'));?>>

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

				<?php

				//get the sidebar
				$avia_config['currently_viewing'] = 'page';
				get_sidebar();

				?>

			</div><!--end container-->

		</div><!-- close default .container_wrap element -->

<?php get_footer(); ?>
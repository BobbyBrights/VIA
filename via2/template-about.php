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
					<div class="via_calendar">
						<p class="via_calendar_header">Calendar</p>
						<ul class="via_calendar_entries">
						<?php

							$via_calendar_args = array( 'post_type' => 'post', 'category_name' => 'calendar', 'posts_per_page' => -1 );
							$via_calendar_posts = get_posts( $via_calendar_args );

							foreach ( $via_calendar_posts as $post ) : setup_postdata( $post );

								$event_date = new DateTime( get_field( 'event_date' ) );
								$event_time = get_field( 'event_time' );
								$event_location = get_field( 'event_location' );
								$event_link = get_field( 'event_link' ); ?>
							<li>
								<span class="via_calendar_date"><?php echo $event_date->format('F j Y'); ?></span>
								<span class="via_calendar_time"><?php echo $event_time; ?></span>
								<span class="via_calendar_title"><?php the_title(); ?></span>
								<span class="via_calendar_location"><?php echo $event_location; ?></span>
								<span class="via_event_link"><?php echo $event_link; ?></span>
							</li>
						<?php endforeach; wp_reset_postdata(); ?>
						</ul>
					</div>
					<?php echo get_field('VIA_description'); ?>
				</div>

				<div class="one_col">
					<div class="about_follow">
						<strong>
							VisionIntoArt <br />
							25 Columbus Circle 68B <br />
							NY, NY 10019
						</strong>
						<p>Telephone 646.942.7659 <br />info@visionintoart.org</p>
						<p>Follow us:</p>
						<ul class="social_icons">

						</ul>
					</div>
					<?php echo get_field('board_members_description'); ?>
				</div>
				<main class='one_col template-page content  <?php avia_layout_class( 'content' ); ?> units' <?php avia_markup_helper(array('context' => 'content','post_type'=>'page'));?>>

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
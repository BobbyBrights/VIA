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
					<?php
						$via_calendar_args = array( 'post_type' => 'post', 'category_name' => 'calendar', 'order' => 'DESC', 'orderby' => 'meta_value', 'meta_key' => 'event_date', 'posts_per_page' => -1 );
						$via_calendar_posts = get_posts( $via_calendar_args );

						if ( $via_calendar_posts ) : ?>
					<div class="via_calendar">
						<p class="via_calendar_header">Calendar</p>
						<ul class="via_calendar_entries">
						<?php foreach ( $via_calendar_posts as $post ) : setup_postdata( $post );

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
					<?php endif; ?>
					<?php echo get_field('VIA_description'); ?>
				</div>

				<div class="one_col">
					<div class="about_follow">
						<img src="<?php bloginfo('url'); ?>/wp-content/themes/via2/images/layout/marker_icon.svg" alt="" class="map-marker">
						<strong>
							VisionIntoArt <br />
							25 Columbus Circle 68B <br />
							NY, NY 10019
						</strong>
						<p>Telephone 646.942.7659 <br />info@visionintoart.org</p>
						<p>Follow us:</p>
						<ul class="social_icons-about noLightbox social_bookmarks icon_count_3">
							<li class="social_bookmarks_twitter av-social-link-twitter social_icon_1">
								<a target="_blank" href="https://twitter.com/visionintoart" aria-hidden="true" data-av_icon="" data-av_iconfont="entypo-fontello" title="Twitter"><span class="avia_hidden_link_text">Twitter</span></a>
							</li>
							<li class="social_bookmarks_facebook av-social-link-facebook social_icon_2">
								<a target="_blank" href="https://www.facebook.com/VisionIntoArt" aria-hidden="true" data-av_icon="" data-av_iconfont="entypo-fontello" title="Facebook"><span class="avia_hidden_link_text">Facebook</span></a>
							</li>
							<li class="social_bookmarks_instagram av-social-link-instagram social_icon_3">
								<a target="_blank" href="http://instagram.com/visionintoart/" aria-hidden="true" data-av_icon="" data-av_iconfont="entypo-fontello" title="Instagram"><span class="avia_hidden_link_text">Instagram</span></a>
							</li>
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

			</div><!--end container-->

		</div><!-- close default .container_wrap element -->

<?php get_footer(); ?>
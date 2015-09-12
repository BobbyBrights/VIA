<?php

/*
 * Template name: Home
 */

global $avia_config;

	/*
	 * get_header is a basic wordpress function, used to retrieve the header.php file in your theme directory.
	 */
	 get_header();


 	 if( get_post_meta(get_the_ID(), 'header', true) != 'no') echo avia_title();
	 ?>

		<div class='container_wrap container_wrap_first main_color <?php avia_layout_class( 'main' ); ?>'>

			<div class='container'>

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
				<div class="one_col">
					<?php dynamic_sidebar('homepage'); ?>
					<ul class="featured_release">
					<?php
						$portfolio = new WP_Query('post_type=portfolio&posts_per_page=1');

						if ( $portfolio->have_posts() ) : while ( $portfolio->have_posts() ) : $portfolio->the_post(); ?>
						<li>
							<a href="<?php the_permalink(); ?>">
								<p class="featured_release_header"><strong>VIA Records latest release</strong></p>
								<p class="featured_release_title"><?php the_title(); ?></p>
								<?php the_post_thumbnail( array(800,800), array( 'class' => 'featured_release_thumbnail' ) ); ?>
								<p class="via_records_link"><a href="#">VIA Records</a></p>
							</a>
						</li>
					<?php endwhile; endif; wp_reset_query(); ?>
					</ul>
				</div>
				<div class="one_col">
					<ul class="featured_social">
					<?php
						$tweet_args = array( 'category_name' => 'tweet', 'posts_per_page' => 1 );
						$facebook_args = array( 'category_name' => 'facebook-post', 'posts_per_page' => 1 );

						$featured_tweet = get_posts( $tweet_args );
						$featured_fbpost = get_posts( $facebook_args );

						foreach ( $featured_tweet as $post ) : setup_postdata( $post );

							$tweet_date = new DateTime( get_field( 'event_date' ) ); ?>
						<li>
							<p>Tweet</p>
							<?php the_content(' '); ?>
							<p class="post_date"><?php echo $tweet_date->format('F j Y'); ?></p>
						</li>
						<?php
							wp_reset_postdata(); endforeach;

							foreach ( $featured_fbpost as $post ) : setup_postdata( $post );

								$tweet_date = new DateTime( get_field( 'event_date' ) ); ?>
						<li>
							<p>Facebook</p>
							<?php the_content(' '); ?>
							<p class="post_date"><?php echo $tweet_date->format('F j Y'); ?></p>
						</li>
					<?php endforeach; wp_reset_postdata(); ?>
					</ul>
				</div>
			</div><!--end container-->

		</div><!-- close default .container_wrap element -->

<?php get_footer(); ?>
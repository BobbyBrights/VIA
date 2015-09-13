<?php

/*
 * Template name: Projects
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

				<main class='template-page content'>
					<ul class="project-posts">
				<?php 
					$portfolio = new WP_Query('post_type=portfolio&posts_per_page=-1');

						if ( $portfolio->have_posts() ) : while ( $portfolio->have_posts() ) : $portfolio->the_post(); ?>
				<li class="project_thumbnail">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( array(800,800), array('class' => 'project_thumbnail_img') ); ?>
						<div class="project_thumbnail_overlay">
							<?php the_title(); ?>
						</div>
					</a>
				</li>
				<?php endwhile; endif; wp_reset_query(); ?>
				</ul>
				<!--end content-->
				</main>

			</div><!--end container-->

		</div><!-- close default .container_wrap element -->

<?php get_footer(); ?>
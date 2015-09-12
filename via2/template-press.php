<?php

/*
 * Template name: Press
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

				<div class="one_col">
					<h1>Press</h1>
					<?php echo get_field('press_highlights'); ?>
				</div>
				<main class='three_col template-page content'>
				<ul class="blog_posts">
				<?php
					$blog_args = array('posts_per_page' => -1); 
					$blog_posts = get_posts( $blog_args );

					foreach ( $blog_posts as $post ) : setup_postdata( $post ); ?>
					<?php if ( !in_category('calendar') ) : ?>
					<li class="blog_thumbnail <?php if ( in_category('tweet') ) : ?>tweet<?php elseif ( in_category('facebook-post') ) : ?>facebook<?php endif; ?>">
						<?php if ( in_category('tweet') ) : ?>
							<p class="post_title">Tweet</p>
						<?php elseif ( in_category('facebook-post') ) : ?>
							<p class="post_title">Facebook</p>
						<?php else : ?>
							<p class="post_title"><?php the_title(); ?></p>
						<?php endif; ?>
						<?php the_post_thumbnail( array(800, 800), array( 'class' => 'blog_thumbnail_img' ) ); ?>
						<?php $post_excerpt = get_field('post_excerpt'); if ( $post_excerpt ) : ?><p class="post_excerpt"><?php echo $post_excerpt; ?></p><?php endif; ?>
						<p class="read-more"><a href="<?php the_permalink(); ?>">Read More</a></p>
					</li>
					<?php endif; ?>
				<?php endforeach; wp_reset_postdata(); ?>
				</main>
				</ul>
			</div><!--end container-->

		</div><!-- close default .container_wrap element -->

<?php get_footer(); ?>
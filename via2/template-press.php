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

			<div class='container' id="press">

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
						<?php the_post_thumbnail( array(800, 800), array( 'class' => 'blog_thumbnail_img' ) ); ?>
						<?php if ( in_category('tweet') ) : ?>
							<p class="post_title">Tweet</p>
						<?php elseif ( in_category('facebook-post') ) : ?>
							<p class="post_title">Facebook</p>
						<?php else : ?>
							<p class="post_title"><?php the_title(); ?></p>
						<?php endif; ?>
						<?php 
							if ( in_category('tweet') || in_category('facebook-post') ) : 
							$post_date = new DateTime( get_field('event_date') ); ?>
							<?php the_content(); ?>
							<p class="post_date"><?php echo $post_date->format('F j Y'); ?></p>
						<?php else : ?>
							<?php $post_excerpt = get_field('post_excerpt'); if ( $post_excerpt ) : ?><p class="post_excerpt"><?php echo $post_excerpt; ?></p><?php endif; ?>
							<p class="read-more"><button class="trigger">Read More</button></p>
							<div class="post_data" style="display:none;">
								<div class="post_date"><?php the_date(); ?></div>
								<div class="post_author"><?php the_author(); ?></div>
								<div class="post_content"><?php the_content(); ?></div>
							</div>
						<?php endif; ?>
					</li>
					<?php endif; ?>
				<?php endforeach; wp_reset_postdata(); ?>
				</main>
				</ul>
			</div><!--end container-->
			<script>
				$ = jQuery
				$(function(e){
					$('.trigger').on('click', function(e){
						var postTitle = $(this).parent().parent().find('.post_title').text(),
							postDate = $(this).parent().parent().find('.post_date').text(),
							postAuthor = $(this).parent().parent().find('.post_author').text(),
							postContent = $(this).parent().parent().find('.post_content').html();

						if ( $('.main_post').length > 0 ) {
							$('.main_post .post_title').text(postTitle);
							$('.main_post .post_date').text(postDate);
							$('.main_post .post_author').text(postAuthor);
							$('.main_post .post_content').replaceWith('<div class="post_content">' + postContent + '</div>');
						} else {
							$('.blog_posts').before(
								'<div class="main_post">' +
								'<h1 class="post_title">' + postTitle + '</h1>' +
								'<div class="post_meta">' + 
								'<span class="post_date">' + postDate + '</span>' +
								'<span class="post_author">' + postAuthor + '</span>' + 
								'</div>' +
								'<div class="post_content">' + postContent + '</div>' +
								'</div>'
								)

						}


					})
				})
			</script>
		</div><!-- close default .container_wrap element -->

<?php get_footer(); ?>
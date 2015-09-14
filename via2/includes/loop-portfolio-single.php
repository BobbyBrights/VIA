<?php
global $avia_config, $post_loop_count;

$post_loop_count= 1;
$post_class 	= "post-entry-".avia_get_the_id();



// check if we got posts to display:
if (have_posts()) :

	while (have_posts()) : the_post();

		$secondary_image = get_field('secondary_image'); // file upload
		$tertiary_image = get_field('tertiary_image'); // file upload
		$quaternary_image = get_field('quaternary_image'); // file upload what is semantically correct here?

		$aside_content_image = get_field('aside_content_image'); // file upload
		$aside_content_video = get_field('aside_content_video'); // rich text editor for embed code
		$press_highlights = get_field('press_highlights'); // rich text editor

		$itunes_purchase_link = get_field('itunes_purchase_link'); // text input
		$amazon_purchase_link = get_field('amazon_purchase_link'); // text input
?>

		<div class='post-entry post-entry-type-page <?php echo $post_class; ?>' <?php avia_markup_helper(array('context' => 'entry')); ?>>

			<div class="three_col entry-content-wrapper clearfix">
				<div class="featured_wrapper">
					<?php the_post_thumbnail( 'full', array( 'class' => 'single_project_featured_image') ); ?>
					<ul class="aside_images"><!-- li items should have a fixed style to account for empty spaces -->
						<li class="aside_image"><?php echo the_post_thumbnail( 'full' ); ?></li>
						<li class="aside_image"><img src="<?php echo $secondary_image; ?>" /></li>
						<li class="aside_image"><img src="<?php echo $tertiary_image; ?>" /></li>
						<li class="aside_image"><img src="<?php echo $quaternary_image; // address semantic inconsistency ?>" /></li>
					</ul>
					<ul class="purchase_links">
						<?php if ( $amazon_purchase_link ) : ?><li><a href="<?php echo $amazon_purchase_link; ?>" target="_blank"><img src="<?php bloginfo('url'); ?>/wp-content/themes/via2/images/layout/amazon_icon.png" alt="Amazon" /></a></li><?php endif; ?>
						<?php if ( $itunes_purchase_link ) : ?><li><a href="<?php echo $itunes_purchase_link; ?>" target="_blank"><img src="<?php bloginfo('url'); ?>/wp-content/themes/via2/images/layout/itunes_icon.png" alt="iTunes" /></a></li><?php endif; ?>
					</ul>
				</div>
				<div class="single_project_content">
					<h1 class="single_project_title"><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</div>
			</div>

			<?php if ( $aside_content_image || $aside_content_video || $press_highlights ) : ?>
			<div class="one_col single_sidebar">
				<div class="aside_content">
					<?php if ( $aside_content_image && !$aside_content_video ) :

							echo $aside_content_image;

						elseif ( !$aside_content_image && $aside_content_video ) :

							echo $aside_content_video;

						else :

							echo $aside_content_video;

					 	endif; ?>
				</div>
				<div class="press_highlights">
					<?php echo $press_highlights; ?>
				</div>
			</div>
			<?php endif; ?>
		</div><!--end post-entry-->


<?php
	$post_loop_count++;
	endwhile;
	else:
?>

    <article class="entry">
        <header class="entry-content-header">
            <h1 class='post-title entry-title'><?php _e('Nothing Found', 'avia_framework'); ?></h1>
        </header>

        <?php get_template_part('includes/error404'); ?>

        <footer class="entry-footer"></footer>
    </article>

<?php

	endif;
?>

<script>
	var $ = jQuery;

	$(function(){
		var featuredImg = $('.single_project_featured_image'),
			asideImg = $('.aside_image img');

		asideImg.on('click', function(){
			console.log(asideImg + 'was clicked!')

			imgLink = $(this).attr('src');

			featuredImg.attr('src', imgLink);
		})

		function iframeResponsive() {
		    function setAspectRatio() {
		      $('iframe').each(function() {
		        $(this).css('height',$(this).width()*9/16)
		      })
		    }

		    setAspectRatio()   
		    $(window).resize(setAspectRatio)
		}

		iframeResponsive()
	})

</script>
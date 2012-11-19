<?php
/**
 * Template Name: What we do
 * Description: What we do page template
 *
 * @package WordPress
 * @subpackage themename
 */
 
get_header(); ?>

		<div id="primary">
			<div id="content">
				<?php the_post(); ?>
				<?php pg_header(); ?>
				<section id="timeline">
					<div id="left">
					
						<?php $meta = get_post_meta($post->ID, '_timeline_intro_meta', true);
						echo '<article id="timeline-intro">';
						echo '<h2>' . $meta['intro_title'] . '</h2>';
						echo '<p>' . $meta['intro_text'] . '</p>';
						echo '</article><!--#timeline-intro-->';
						
						$i=0;
						$args = array('post_type' => 'timeline');
						$wp_query = new WP_Query($args);
						while ( $wp_query->have_posts() ) : $wp_query->the_post();
						$i++;
						if(($i % 2) == 0){
							the_timeline_exceprt();
						}
						endwhile;
					?>
					</div><!--#left-->
					<div id="right">
					<?php 
						$wp_query = new WP_Query($args);
						$i=0;
						while ( $wp_query->have_posts() ) : $wp_query->the_post();
						$i++;
						if(($i % 2) == 1){
							the_timeline_exceprt();
						}
						endwhile;
					?>
					</div><!--#right-->
				<section><!--#timeline-->
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>
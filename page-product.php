<?php
/**
 * Template Name: Products
 * Description: Products Page template
 *
 * @package WordPress
 * @subpackage themename
 */
 
get_header();
		the_post();
		pg_header(); ?>
		
		<div id="content">
		<?php
			page_sections();
			echo '<div id="contact-retailers" class="clearfix">';
			echo '<section id="retailers" class="profiles threecol">';
			echo '<h3>Where to Buy</h3>';
		
				$args = array('post_type' => 'retailer_profile', 'posts_per_page' => '-1');
				$wp_query = new WP_Query($args);
				$i=1;
				if( $wp_query->have_posts() ): while ( $wp_query->have_posts() ) : $wp_query->the_post();
						$class = rowpos_class($i , 3, $wp_query->post_count);
						profile_markup($class);
						$i++;
				endwhile;
				else: ?>
					<article id="no-shops-msg"><h1>Available in stores soon</h1></article>
				<?php endif;
			echo '</section><!--#retailers-->';
			
			wp_reset_query();
			echo '<aside class="contact-form">';
			echo '<h3>Interested in stocking our products?</h3>';
			echo do_shortcode('[contact-form-7 id="589" title="Contact"]');
			echo '</aside><!--.contact-form-->';
			echo '</div><!--#contact-retailers-->'; ?>
		</div><!-- #content -->

<?php get_footer(); ?>
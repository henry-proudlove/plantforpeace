<?php
/**
 * Template Name: Supporters
 * Description: Supporters Page template
 *
 * @package WordPress
 * @subpackage themename
 */
 
get_header(); ?>

		<div id="primary">
			<div id="content">
			<?php the_post();
				pg_header();
				echo '<section id="supporters-people" class="profiles fivecol">';
				echo '<h3>People</h3>';
			
					$args = array('post_type' => 'sp_people_profile');
					$wp_query = new WP_Query($args);
					
					while ( $wp_query->have_posts() ) : $wp_query->the_post();
							profile_markup();
					endwhile;
				echo '</section><!--#supporters-people-->';
				
				wp_reset_query();
				
				echo '<section id="supporters-companies" class="fivecol">';
				echo '<h3>Companies</h3>';
			
					$args = array('post_type' => 'sp_company_profile');
					$wp_query = new WP_Query($args);
					
					while ( $wp_query->have_posts() ) : $wp_query->the_post();
							profile_markup();
					endwhile;
				echo '</section><!--#supporters-companies-->';
				
				wp_reset_query(); ?>
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>
<?php
/**
 * Template Name: Supporters
 * Description: Supporters Page template
 *
 * @package WordPress
 * @subpackage themename
 */
 
get_header();
		the_post();
		pg_header(); ?>
		
		<div id="content">
		<?php
			echo '<section id="supporters-people" class="profiles clearfix">';
			echo '<h3>People</h3>';
		
				$args = array('post_type' => 'sp_people_profile', 'posts_per_page' => '-1');
				$wp_query = new WP_Query($args);
				$i=1;
				while ( $wp_query->have_posts() ) : $wp_query->the_post();
						$class = rowpos_class($i , 5, $wp_query->post_count);
						profile_markup($class);
						$i++;
				endwhile;
			echo '</section><!--#supporters-people-->';
			
			wp_reset_query();
			
			echo '<section id="supporters-companies" class="profiles clearfix">';
			echo '<h3>Companies</h3>';
		
				$args = array('post_type' => 'sp_company_profile' , 'posts_per_page' => '-1');
				$wp_query = new WP_Query($args);
				$i=1;
				while ( $wp_query->have_posts() ) : $wp_query->the_post();
						$class = rowpos_class($i , 5, $wp_query->post_count);
						profile_markup($class);
						$i++;
				endwhile;
			echo '</section><!--#supporters-companies-->';
			
			wp_reset_query(); ?>
		</div><!-- #content -->

<?php get_footer(); ?>
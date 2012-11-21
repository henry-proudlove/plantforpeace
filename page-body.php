<?php
/**
 * Template Name: Body
 * Description: Body Page template
 *
 * @package WordPress
 * @subpackage themename
 */
 
get_header(); ?>
		<?php 
			the_post();
			pg_header();
		?>
		<div id="primary">
			<div id="content">
				<?php
					people_profiles();
					page_sections();
				?>
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>
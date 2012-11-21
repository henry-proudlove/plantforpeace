<?php
/**
 * Template Name: Body
 * Description: Body Page template
 *
 * @package WordPress
 * @subpackage themename
 */
 
get_header();
		
		the_post();
		pg_header();?>
		
			<div id="content">
				<?php
					people_profiles();
					page_sections();
				?>
			</div><!-- #content -->

<?php get_footer(); ?>
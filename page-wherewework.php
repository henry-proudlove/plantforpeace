<?php
/**
 * Template Name: Where we work
 * Description: Where We Work Page template
 *
 * @package WordPress
 * @subpackage themename
 */
 
get_header();
		the_post();
		pg_header(); ?>

		<div id="content">
			<?php page_sections(); ?>
		</div><!-- #content -->

<?php get_footer(); ?>
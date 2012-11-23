<?php
/**
 * Template Name: Resources
 * Description: Resources Page Template
 *
 * @package WordPress
 * @subpackage themename
 */
 
get_header();
		the_post();
		pg_header(); ?>
		
		<div id="content" class="centered resources">
			<?php get_resources('resources'); ?>
		</div><!-- #content -->

<?php get_footer(); ?>
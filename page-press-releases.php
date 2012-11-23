<?php
/**
 * Template Name: Press Releases
 * Description: Press Releases template
 *
 * @package WordPress
 * @subpackage themename
 */
 
get_header();
		the_post();
		pg_header(); ?>
		
		<div id="content" class="centered resources">
			<?php get_resources('press_rels'); ?>
		</div><!-- #content -->

<?php get_footer(); ?>
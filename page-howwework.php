<?php
/**
 * Template Name: How we Work
 * Description: How we Work Page template
 *
 * @package WordPress
 * @subpackage themename
 */
 
get_header();
		the_post();
		pg_header();
		?>
		<div id="content">
			<?php threecol_promos('howwework_promo'); ?>
		</div><!-- #content -->

<?php get_footer(); ?>
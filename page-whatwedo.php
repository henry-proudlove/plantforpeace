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
				<section id="intro">
				<?php the_post(); ?>
				<?php pg_header(); ?>
				</section><!--#intro-->
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>
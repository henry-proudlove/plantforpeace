<?php
/**
 * @package WordPress
 * @subpackage themename
 */

get_header(); ?>
		<section id="intro">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
				<div id="carousel"></div>
				<div class="page-intro">
					<h1 class="entry-title">Media</h1>
				</div><!-- .intro -->
			</article><!-- #post-<?php the_ID(); ?> -->
		</section><!--#intro-->
		<div id="container" class="clearfix">
			<div id="primary">
				<div id="content">
					<?php get_template_part( 'loop', 'index' ); ?>
	
				</div><!-- #content -->
			</div><!-- #primary -->

<?php get_sidebar(); ?>
		</div><!--#container-->
<?php get_footer(); ?>
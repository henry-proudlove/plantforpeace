<?php
/**
 * @package WordPress
 * @subpackage themename
 */

get_header(); ?>
		the_post(); ?>
		<section id="intro">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
				<div id="carousel"></div>
				<div class="page-intro">
					<h3 class="breadcrumb">Category Archive</h3> 
					<?php
						printf( __( '<h1 class="entry-title">%s</h1>', 'themename' ), '<span>' . single_cat_title( '', false ) . '</span>' );
					?>
				</div><!-- .intro -->
			</article><!-- #post-<?php the_ID(); ?> -->
		</section><!--#intro-->
		
		<div id="container" class="clearfix">
			<div id="primary">
				<div id="content">
					<?php get_template_part( 'loop', 'archive' ); ?>
	
				</div><!-- #content -->
			</div><!-- #primary -->

<?php get_sidebar(); ?>
		</div><!--#container-->
<?php get_footer(); ?>
		
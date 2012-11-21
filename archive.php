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
					<?php if ( is_day() ) : ?>
							<h3 class="breadcrumb">Daily Archives</h3> 
							<?php printf( __( '<h1 class="entry-title">%s</h1>', 'themename' ), get_the_date() ); ?>
						<?php elseif ( is_month() ) : ?>
							<h3 class="breadcrumb">Monthly Archives</h3>
							<?php printf( __( '<h1 class="entry-title">%s</h1>' ), get_the_date( 'F Y' ) ); ?>
						<?php elseif ( is_year() ) : ?>
							<h3 class="breadcrumb">Yearly Archives</h3> 
							<?php printf( __( '<h1 class="entry-title">%s</h1>', 'themename' ), get_the_date( 'Y' ) ); ?>
						<?php else : ?>
							<?php _e( 'Blog Archives', 'themename' ); ?>
						<?php endif; ?>
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
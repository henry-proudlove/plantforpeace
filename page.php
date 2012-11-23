<?php
/**
 * @package WordPress
 * @subpackage themename
 */

get_header();
			the_post(); ?>
			<section id="intro">
			<article role="article">
				<div id="carousel"></div>
				<div class="page-intro">
					<?php
						$parent = get_parent();
						if($parent){?>
							<h3 class="breadcrumb"><a href="<?php echo get_permalink($parent); ?>" rel="bookmark"><?php echo get_the_title($parent); ?></a></h3><?php
						} 
					?>
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</div><!-- .intro -->
			</article>
			</section><!--#intro-->
			<div id="content" class="centered">				

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">

					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-<?php the_ID(); ?> -->
			</div><!-- #content -->

<?php get_footer(); ?>
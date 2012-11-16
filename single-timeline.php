<?php
/**
 * @package WordPress
 * @subpackage themename
 */

get_header(); ?>

		<div id="primary">
			<div id="content">

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
				
					<?php 
						$meta = get_post_meta(get_the_id(), '_timeline_meta', true);
						if($meta['image-video'] == 'video'){
							echo wp_oembed_get($meta['video_url'], array('width'=>520, 'height'=> 430));
						}else{
							img_fecther($size='overlay', $limit=1);
						}
					?>
					
					<div class="timeline-content">
						<header class="entry-header">
							<div class="entry-meta">
								<?php
									printf( __( '<a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s" pubdate>%3$s</time></a>', 'themename' ),
										get_permalink(),
										get_the_date( 'c' ),
										get_the_date()
									);
								?>
							</div><!-- .entry-meta -->
							<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'themename' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
						</header><!-- .entry-header -->
	
						<div class="entry-content">
							<?php the_content(); ?>
						</div><!-- .entry-content -->
	
						<footer class="entry-meta">
							<span class="cat-links"><span class="entry-utility-prep entry-utility-prep-cat-links"><?php _e( 'Posted in ', 'themename' ); ?></span><?php the_category( ', ' ); ?></span>
						</footer><!-- #entry-meta -->
					</div><!--.timeline-content-->
				</article><!-- #post-<?php the_ID(); ?> -->

				<nav id="nav-below" role="article">
					<h1 class="section-heading"><?php _e( 'Post navigation', 'themename' ); ?></h1>
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'themename' ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'themename' ) . '</span>' ); ?></div>
				</nav><!-- #nav-below -->

			<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>
<?php
/**
 * @package WordPress
 * @subpackage themename
 */

get_header(); ?>
			<section id="intro">
				<article role="article">
					<div id="carousel"></div>
					<div class="page-intro">
						<h1 class="entry-title">News</h1>
					</div><!-- .intro -->
				</article>
			</section><!--#intro-->
			<div id="content" class="centered">

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
					
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
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<?php
							if(has_post_thumbnail()){
								the_post_thumbnail('news-header');
							}	
						?>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'themename' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->

					<footer class="entry-meta">
						<span class="cat-links"><span class="entry-utility-prep entry-utility-prep-cat-links"><?php _e( 'Posted in ', 'themename' ); ?></span><?php the_category( ', ' ); ?></span>
					</footer><!-- #entry-meta -->
				</article><!-- #post-<?php the_ID(); ?> -->

				<nav id="nav-below" role="article">
					<h1 class="section-heading visuallyhidden"><?php _e( 'Post navigation', 'themename' ); ?></h1>
					<div class="nav-previous"><a href="<?php echo get_permalink(get_adjacent_post(false,'',false)) . '#content'; ?>" rel="bookmark"></a></div>
					<div class="nav-next"><a href="<?php echo get_permalink(get_adjacent_post(false,'',true)) . '#content'; ?>" rel="bookmark"></a></div>
				</nav><!-- #nav-below -->

			<?php endwhile; ?>

			</div><!-- #content -->

<?php get_footer(); ?>
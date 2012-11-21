<?php
/**
 * @package WordPress
 * @subpackage themename
 */
?>

<?php /* Display navigation to next/previous pages when applicable */ ?>


<?php /* Start the Loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>

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
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'themename' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<?php img_fecther($size='news_header', $limit=1); ?>
		</header><!-- .entry-header -->

		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<a href="<?php the_permalink(); ?>" class="arrow-link" title="<?php printf( esc_attr__( 'Permalink to %s', 'themename' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">Read more</a>
		<footer class="entry-meta">
			<span class="cat-links"><span class="entry-utility-prep entry-utility-prep-cat-links"><?php _e( 'Posted in ', 'themename' ); ?></span><?php the_category( ', ' ); ?></span>
		</footer><!-- #entry-meta -->
	</article><!-- #post-<?php the_ID(); ?> -->

	<?php comments_template( '', true ); ?>

<?php endwhile; ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
	<nav id="nav-below" role="article">
		<h1 class="section-heading"><?php _e( 'Post navigation', 'themename' ); ?></h1>
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'themename' ) ); ?></div>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'themename' ) ); ?></div>
	</nav><!-- #nav-below -->
<?php endif; ?>

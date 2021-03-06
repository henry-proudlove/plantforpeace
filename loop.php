<?php
/**
 * @package WordPress
 * @subpackage themename
 */
?>

<?php /* Display navigation to next/previous pages when applicable */ ?>


<?php /* Start the Loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
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
			<h1 class="entry-title"><a href="<?php echo get_permalink(). '#content' ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'themename' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<?php
				if(has_post_thumbnail()){
					the_post_thumbnail('news_lead');
				}	
			?>
		</header><!-- .entry-header -->

		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<footer class="entry-meta">
			<a href="<?php echo get_permalink() . '#content'; ?>" class="arrow-link" title="<?php printf( esc_attr__( 'Permalink to %s', 'themename' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">Read more</a>
			<span class="cat-links"><span class="entry-utility-prep entry-utility-prep-cat-links"><?php _e( 'Posted in ', 'themename' ); ?></span><?php the_category( ', ' ); ?></span>
		</footer><!-- #entry-meta -->
	</article><!-- #post-<?php the_ID(); ?> -->

	<?php comments_template( '', true ); ?>

<?php endwhile; ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
	<nav id="nav-below" role="article">
		<h1 class="section-heading visuallyhidden"><?php _e( 'Post navigation', 'themename' ); ?></h1>
		<div class="nav-previous"><?php next_posts_link( __( 'Older posts', 'themename' ) ); ?></div>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts', 'themename' ) ); ?></div>
	</nav><!-- #nav-below -->
<?php endif; ?>

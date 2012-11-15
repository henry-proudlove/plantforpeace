<?php
/**
 * Template Name: Home Page
 * Description: Holder for Home Page
 *
 * @package WordPress
 * @subpackage themename
 */
 
get_header(); ?>

		<div id="primary">
			<div id="content">
				<section id="carousel">
				<ul id="home-carousel">	
					<?php
						$args = array('post_type' => 'hp_carousel');
						$wp_query = new WP_Query($args);
						
						while ( $wp_query->have_posts() ) : $wp_query->the_post();
							
							if(has_post_thumbnail()):
								$link = carousel_meta(); 
								?>
								<li id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
									<a href="<?php echo $link['ct_link']; ?>" class="<?php echo $link['page-video'];?>" rel="bookmark">
										<?php the_post_thumbnail('carousel'); ?>
									</a>
								</li>
							<?php endif;
						endwhile; ?>
				</section><!--#carousel-->
				<?php threecol_promos('hp_promos'); ?>
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>
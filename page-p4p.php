<?php
/**
 * Template Name: Plant For Peace
 * Description: Plant For Peace Page template
 *
 * @package WordPress
 * @subpackage themename
 */
 
get_header();
		
		the_post(); ?>
		<section id="intro">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
				<?php
				echo '<div id="carousel"><div id="header-images">';
				img_fecther('header' , -1);
				echo '</div><!--#header-images--></div><!--#carousel-->';
				?>
				<div class="page-intro">
					<?php
					$parent = get_parent();
					if($parent){?>
						<h3 class="breadcrumb"><a href="<?php echo get_permalink($parent); ?>" rel="bookmark"><?php echo get_the_title($parent); ?></a></h3><?php
						} 
					?>
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<h3 class="foundation-links"><a href=#foundation-uk">UK</a><span id=foundation-slash"> / </span><a href="#foundation-af">Afganistan</a></h3>
					<div class="entry-content clearfix">
						<?php the_content(); ?>
					</div><!-- .entry-content -->
				</div><!-- .intro -->
				
			</article><!-- #post-<?php the_ID(); ?> -->
		</section><!--#intro-->
		
		<div id="content"> 
			<section id="foundation-uk"><?php
				$type = pagefinder() . '_profile';
		
				echo '<section id="people" class="profiles">';
				echo '<h3>Plant for Peace UK</h3>';
					profiles_loop($type);
				echo '</section><!--#people-->';
				
				$type = pagefinder() . '_secs';
				sections_loop($type);?>
			</section><!--#foundation-uk-->
			<section id="foundation-af"><?php
				$type = pagefinder() . '_afg_profile';
		
				echo '<section id="people" class="profiles">';
				echo '<h3>Plant for Peace Afganistan</h3>';
					profiles_loop($type);
				echo '</section><!--#people-->';
				
				$type = pagefinder() . '_afg_secs';
				sections_loop($type);
				?>
			</section><!--#foundation-af-->
		</div><!-- #content -->

<?php get_footer(); ?>
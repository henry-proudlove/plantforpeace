<?php
/**
 * Template Name: Gallery
 * Description: Holder for Gallery Page
 *
 * @package WordPress
 * @subpackage themename
 */

get_header(); ?>
		
		<div id="primary">
			<div id="content">

				<?php the_post(); ?>
				<div class="intro">
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->
				</div><!-- .intro -->
				<div id="galleria" style="width: 750px; height: 490px;>
					<?php img_fecther('medium', -1); ?>
				</div><!--#galleria-->

			</div><!-- #content -->
		</div><!-- #primary -->

<script src="<?php echo get_template_directory_uri(); ?>/js/galleria-1.2.8.min.js"></script>
<script>

    //Load the classic theme
    Galleria.loadTheme('<?php echo get_template_directory_uri(); ?>/js/galleria.classic.min.js');

    //Initialize Galleria
    Galleria.run('#galleria');

</script>

<?php get_footer(); ?>
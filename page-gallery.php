<?php
/**
 * Template Name: Gallery
 * Description: Holder for Gallery Page
 *
 * @package WordPress
 * @subpackage themename
 */

get_header();
		the_post();
		pg_header();
		?>
		<div id="content">

			<div id="galleria" style="width: 750px; height: 490px;>
				<?php img_fecther('medium', -1); ?>
			</div><!--#galleria-->

		</div><!-- #content -->

		<script src="<?php echo get_template_directory_uri(); ?>/js/galleria-1.2.8.min.js"></script>
		<script>
	
		//Load the classic theme
		Galleria.loadTheme('<?php echo get_template_directory_uri(); ?>/js/galleria.classic.min.js');
	
		//Initialize Galleria
		Galleria.run('#galleria', {
			width : 960
		});
	
		</script>

<?php get_footer(); ?>
<?php
/**
 * Template Name: Contact Us
 * Description: Contact Us Page template
 *
 * @package WordPress
 * @subpackage themename
 */
 
get_header(); ?>
		<section id="intro">
			<article role="article">
				<div id="carousel"></div>
				<div class="page-intro">
					<h1 class="entry-title">Contact Us</h1>
				</div><!-- .intro -->
			</article>
		</section><!--#intro-->
		<?php the_post(); ?>
		<div id="content">
			<section id="get-involved" class="clearfix">
				<section id="donate" class="clearfix">
					<div class="entry-content"><?php the_content(); ?></div>
				</section><!--#donate-->
				<section id="participate" class="clearfix">
					<article class="contact-form">
						<header>
							<h3>Email us</h3>
						</header>
						<?php echo do_shortcode('[contact-form-7 id="589" title="Contact"]'); ?>
					</article><!--#donate-link-->
				</section><!--#donate-->
			</section><!--#get-involved-->
		</div><!-- #content -->

<?php get_footer(); ?>
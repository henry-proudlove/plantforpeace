<?php
/**
 * Template Name: Get Involved
 * Description: Get Involved Page template
 *
 * @package WordPress
 * @subpackage themename
 */
 
get_header();
		the_post();
		pg_header(); ?>

		<div id="content">
			<section id="get-involved" class="clearfix">
				<section id="donate" class="clearfix">
					<h2>Donate</h2>
					<article id="products">
						<header>
							<h3>Buy Our Products</h3>
							<img src="<?php echo get_template_directory_uri() . '/images/get_involved_product.jpg'; ?>" width="430" height="182" alt="Fruit Bar" />
						</header>
						<p>Maecenas faucibus mollis interdum. Donec sed odio dui. Maecenas sed diam eget risus varius blandit sit amet non magna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus</p>
						<footer>
							<?php 
							$product_page = get_page_by_title('Products');
							$product_page = get_permalink($product_page->ID);
							?>
							<a href="<?php echo $product_page ?>" class="button red" rel="bookmark">More About Our Products</a>
						</footer>
					</article><!--#products-->
					<article id="donate-link">
						<header>
							<h3>donate to the Plant for peace foundation</h3>
						</header>
						<p>Curabitur blandit tempus porttitor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ullamcorper nulla non metus auctor fringilla</p>
						<footer>
							<a href="#" class="button red" rel="bookmark">Donate via Paypal</a>
						</footer>
					</article><!--#donate-link-->
				</section><!--#donate-->
				<section id="participate" class="clearfix">
					<h2>Participate</h2>
					<article id="follow">
						<header>
							<h3>Follow us</h3>
						</header>
						<a href="#" class="button facebook" rel="bookmark">Be Part of Our Product Team on Facebook</a>
						<a href="#" class="button twitter" rel="bookmark">Join the Campaign on Twitter</a>
						<a href="#" class="button newsletter" rel="bookmark">Subscribe to our newsletter</a>
					</article><!--#follow-->
					<article class="contact-form">
						<header>
							<h3>Join us</h3>
						</header>
						<p>Maecenas faucibus mollis interdum. Donec sed odio dui. Maecenas sed diam eget risus varius blandit sit amet non magna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus</p>
						<?php echo do_shortcode('[contact-form-7 id="589" title="Contact"]'); ?>
					</article><!--#donate-link-->
				</section><!--#donate-->
			</section><!--#get-involved-->
		</div><!-- #content -->

<?php get_footer(); ?>
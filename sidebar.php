<?php
/**
 * @package WordPress
 * @subpackage themename
 */
?>
		<div id="secondary" class="widget-area">
		
				<aside id="press-releases" class="widget clearfix" role="complementary">
					<h3 class="widget-title">Press Releases</h3>
					<?php get_press_releases(); ?>
				</aside><!--#press-releases-->
				
				<aside id="image-gallery" class="widget thumb-gallery clearfix" role="complementary">
					<h3 class="widget-title">Image Gallery</h3>
					<?php thumbs_gallery('Image Gallery'); ?>
				</aside><!--#image-gallery-->

				<aside id="latest-videos" class="widget clearfix" role="complementary">
					<h3 class="widget-title">Videos</h3>
					<div id="thumbs">
						<ul class="videos clearfix"></ul>
					</div>
				</aside><!--#latest-videos-->
				
				<aside id="brand-assets" class="widget thumb-gallery clearfix" role="complementary">
					<h3 class="widget-title">Brand Assets</h3>
					<?php thumbs_gallery('Brand Assets'); ?>
				</aside><!--#brand-assets-->
				
				<aside id="categories" class="widget clearfix" role="complementary">
					<h3 class="widget-title">Categories</h3>
					<ul>
						<?php
						$args = array(
							'orderby'            => 'count',
							'hierarchical'       => 0,
							'title_li'           => '',
							'show_option_none'   => '',
							'number'             => 15
						);
						wp_list_categories($args); ?>
					</ul>
				</aside><!--#categories-->

				<form id="archiveform" action="">
				<select name="archive_chrono" onchange="window.location =(document.forms.archiveform.archive_chrono[document.forms.archiveform.archive_chrono.selectedIndex].value);">
				<option value=''>Archives</option>
				<?php get_archives('monthly','','option'); ?>
				</select>
				</form>

		</div><!-- #secondary .widget-area -->
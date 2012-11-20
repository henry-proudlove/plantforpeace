<?php
/**
 * @package WordPress
 * @subpackage themename
 */
?>
		<div id="secondary" class="widget-area">
		
				<aside id="press-releases" class="widget" role="complementary">
					<h3 class="widget-title">Press Releases</h3>
					<?php get_press_releases(); ?>
				</aside><!--#press-releases-->
				
				<aside id="image-gallery" class="widget thumb-gallery" role="complementary">
					<h3 class="widget-title">Images</h3>
					<?php thumbs_gallery('Image Gallery'); ?>
				</aside><!--#image-gallery-->

				<aside id="latest-videos" class="widget" role="complementary">
					<div id="thumbs">
						<ul class="img-list clearfix"></ul>
					</div>
				</aside><!--#latest-videos-->
				
				<aside id="brand-assets" class="widget thumb-gallery" role="complementary">
					<h3 class="widget-title">Brand Assets</h3>
					<?php thumbs_gallery('Brand Assets'); ?>
				</aside><!--#brand-assets-->
				
				<aside id="categories" class="widget" role="complementary">
					<h3 class="widget-title">Categories</h3>
					<?php wp_list_categories('title_li='); ?>
				</aside><!--#categories-->

				<form id="archiveform" action="">
				<select name="archive_chrono" onchange="window.location =(document.forms.archiveform.archive_chrono[document.forms.archiveform.archive_chrono.selectedIndex].value);">
				<option value=''>Archives</option>
				<?php get_archives('monthly','','option'); ?>
				</select>
				</form>

		</div><!-- #secondary .widget-area -->
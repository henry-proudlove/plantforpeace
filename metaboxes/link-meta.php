<div class="my_meta_control"> 
	<p>
		<label>Text</label>
		<?php $mb->the_field('link_txt'); ?>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
		<span>Text for link to display</span>
	</p>
	<p>
		<label>Link</label>
		<?php $mb->the_field('link_url'); ?>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
		<span>Enter link. must be full URL (e.g. http://www.example.com/example)</span>
	</p>
  
</div>
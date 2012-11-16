<div class="my_meta_control"> 
	<p>
		<label>Title</label>
		<?php $mb->the_field('intro_title'); ?>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	</p>
	<p>
		<label>Text</label>
		<?php $mb->the_field('intro_text'); ?>
		<textarea name="<?php $mb->the_name(); ?>" rows="5"><?php $mb->the_value(); ?></textarea>
	</p>
  
</div>
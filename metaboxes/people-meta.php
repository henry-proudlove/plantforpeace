<div class="my_meta_control"> 
	<p>
		<label>Role</label>
		<?php $mb->the_field('role'); ?>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
		<span>Enter this person's job title</span>
	</p>
  
	<p>
		<label>Email</label>
		<?php $mb->the_field('email'); ?>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
		<span>Enter this person's email address</span>
	</p>

</div>
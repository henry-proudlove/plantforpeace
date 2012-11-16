<div class="my_meta_control">

<?php

$mb->the_field('image-video');

if(is_null($mb->get_the_value()))

	$mb->meta[$mb->name] = 'image';

?>
<label>Lead item is image or video</label>
<p>
<input type="radio" name="<?php $mb->the_name(); ?>" value="image"<?php echo $mb->is_value('image')?' checked="checked"':''; ?>/> Image</input> 

<input type="radio" name="<?php $mb->the_name(); ?>" value="video"<?php echo $mb->is_value('video')?' checked="checked"':''; ?>/> Video </input>
</p>
<p>
	<label>Video URL </label>
	<input type="text" name="<?php $metabox->the_name('video_url'); ?>" value="<?php $metabox->the_value('video_url'); ?>"/>
	<span>Must be full URL (e.g. http://example.com/example)</span>
</p>
</div>


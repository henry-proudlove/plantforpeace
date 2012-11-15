<div class="my_meta_control">

<?php

$mb->the_field('page-video');

if(is_null($mb->get_the_value()))

	$mb->meta[$mb->name] = 'page';

?>
<label>Clickthrough type</label>
<p>
<input type="radio" name="<?php $mb->the_name(); ?>" value="page"<?php echo $mb->is_value('page')?' checked="checked"':''; ?>/> Page</input> 

<input type="radio" name="<?php $mb->the_name(); ?>" value="video"<?php echo $mb->is_value('video')?' checked="checked"':''; ?>/> Video </input>
</p>
<p>
	<label>Clickthrough URL </label>
	<input type="text" name="<?php $metabox->the_name('ct_link'); ?>" value="<?php $metabox->the_value('ct_link'); ?>"/>
	<span>Must be full URL (e.g. http://example.com/example). Video links from vimeo only.
</p>
</div>


<?php
	global $bizpanda;
?>

<div class="onp-help-section">
	<h2><?php _e('Quick Start Guide', 'bizpanda-social-locker'); ?></h2>

	<p>
		<?php _e('You can pick the content you want to lock by using special shortcodes. During installation, the plugin created for you the shortcode <span class="onp-mark onp-mark-gray onp-mark-stricked onp-code">[sociallocker][/sociallocker]</span> named <strong>Social Locker</strong>.', 'bizpanda-social-locker'); ?>
	</p>

	<p class='onp-note'>
		<?php _e('<strong>Note:</strong> You can create more shortcodes at any time for whatever you need them for. For instance, you could create one for locking video players or another one for locking download links.', 'bizpanda-social-locker'); ?>
	</p>

	<p>
		<?php _e('Let\'s examine how to use the default shortcode <strong>Social Locker</strong>.', 'bizpanda-social-locker'); ?>
	</p>
</div>
<div class="onp-help-section">
	<h2>1. <?php _e('Open the editor', 'bizpanda-social-locker'); ?></h2>

	<p><?php printf(__('In admin menu, select Social Locker -> <a href="%s">All Lockers</a>.', 'bizpanda-social-locker'), admin_url('edit.php?post_type=opanda-item')); ?></p>

	<p><?php _e('Click on the shortcode titled "Social Locker" to open the editor:', 'bizpanda-social-locker'); ?></p>

	<p class='onp-img'>
		<img src='<?php echo 'https://cconp.s3.amazonaws.com/bizpanda/social-locker/help/en_US/2.png' ?>'/>
	</p>
</div>
<div class="onp-help-section">
	<h2>2. <?php _e('Configure the locker', 'bizpanda-social-locker'); ?></h2>

	<p>
		1) <?php _e('Set a clear title that attracts attention or creates a call to action (see the example below).', 'bizpanda-social-locker'); ?></p>

	<p>
		2) <?php _e('Describe what the visitor will get after they unlock the content. This is very important, as visitors need to be aware of what they are getting. And please, only promise things you can deliver.', 'bizpanda-social-locker'); ?></p>

	<p>3) <?php _e('Choose one of the available themes for your locker.', 'bizpanda-social-locker'); ?></p>

	<p class='onp-img'>
		<img src='<?php echo 'https://cconp.s3.amazonaws.com/bizpanda/social-locker/help/en_US/3.png' ?>'/>
	</p>

	<p>
		4)  <?php _e('Select social buttons that will be available for visitors and configure every selected button.', 'bizpanda-social-locker'); ?>
	</p>

	<p class='onp-img'>
		<img src='<?php echo 'https://cconp.s3.amazonaws.com/bizpanda/social-locker/help/en_US/4.png' ?>'/>
	</p>

	<p>
		<?php _e('Congratulations! The locker is ready to use.', 'bizpanda-social-locker'); ?>
	</p>

	<p>
		<?php printf(__('The page <a href="%s">Stats & Reports</a> will help you to correct your locker after collecting the first statistical data.', 'bizpanda-social-locker'), admin_url('edit.php?post_type=opanda-item&page=stats-' . $bizpanda->pluginName)); ?>
	</p>

	<p class='onp-note'>
		<?php _e('On the right sidebars, there are some additional options which can help you to adjust the locker to your site audience. Try to use them by yourself later.', 'bizpanda-social-locker'); ?>
	</p>
</div>
<div class="onp-help-section">
	<h2>4. <?php _e('Place the locker shortcode', 'bizpanda-social-locker'); ?></h2>

	<p>
		<?php _e('Decide what content you would like to lock. It might be:', 'bizpanda-social-locker'); ?>
	<ul>
		<li><?php _e('A download link (for instance, a free graphic, an audio file, video resources, or a printable pdf of your article).', 'bizpanda-social-locker'); ?></li>
		<li><?php printf(__('A promo code (for instance, a %s off discount, if the visitor shares your promo page).', 'bizpanda-social-locker'), '10%'); ?></li>
		<li><?php _e('The end of your article (for instance, you might show the beginning of the article to gain interest, but hide the ending).', 'bizpanda-social-locker'); ?></li>
	</ul>
	<?php _e('Basically, you can hide any content that would be important for visitors who are visiting your site.', 'bizpanda-social-locker'); ?>
	</p>
	<p>
		<?php _e('However, <strong>you should never</strong>:', 'bizpanda-social-locker'); ?>
	<ul>
		<li>
			<?php _e('Lock all of your content, posts or pages.', 'bizpanda-social-locker'); ?>
		</li>
		<li>
			<?php _e('Lock boring content or content that is not interesting.', 'bizpanda-social-locker'); ?>
		</li>
	</ul>
	</p>
	<p>
		<?php _e('In other words, don not try to trick your visitors. If you do, people will become annoyed and will remove the likes/tweets/+1s after unlocking your content, which will not have the desired result.', 'bizpanda-social-locker'); ?>
	</p>

	<p>
		<?php _e('Open the post editor for the post where you want to put the locker.', 'bizpanda-social-locker') ?>
	</p>

	<p>
		<?php _e('Then wrap the content you want to lock within the locker shortcode. For instance: <span class="onp-mark onp-mark-gray onp-mark-stricked onp-code">[sociallocker] Locked Content Goes Here [/sociallocker]</span>:', 'bizpanda-social-locker'); ?>
	</p>

	<p class='onp-img'>
		<img src='<?php echo 'https://cconp.s3.amazonaws.com/bizpanda/social-locker/help/en_US/5.png' ?>'/>
	</p>

	<p>
		<?php _e('That\'s it! Save your post and see it on your site! ', 'bizpanda-social-locker'); ?>
	</p>

	<p class='onp-img'>
		<img src='<?php echo 'https://cconp.s3.amazonaws.com/bizpanda/social-locker/help/en_US/6.png' ?>'/>
	</p>
</div>
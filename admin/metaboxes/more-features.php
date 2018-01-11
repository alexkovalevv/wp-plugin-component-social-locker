<?php
	/**
	 * The file contains a class to configure the metabox "More Features?".
	 *
	 * Created via the Factory Metaboxes.
	 *
	 * @author Paul Kashtanoff <paul@byonepress.com>
	 * @copyright (c) 2013, OnePress Ltd
	 *
	 * @package core
	 * @since 1.0.0
	 */

	/**
	 * The class to configure the metabox "More Features?".
	 *
	 * @since 1.0.0
	 */
	class OPanda_SocialLockerMoreFeaturesMetaBox extends FactoryMetaboxes000_Metabox {

		/**
		 * A visible title of the metabox.
		 *
		 * Inherited from the class FactoryMetabox.
		 * @link http://codex.wordpress.org/Function_Reference/add_meta_box
		 *
		 * @since 1.0.0
		 * @var string
		 */
		public $title;

		/**
		 * The priority within the context where the boxes should show ('high', 'core', 'default' or 'low').
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_meta_box
		 * Inherited from the class FactoryMetabox.
		 *
		 * @since 1.0.0
		 * @var string
		 */
		public $scope = 'opanda';

		/**
		 * The part of the page where the edit screen section should be shown ('normal', 'advanced', or 'side').
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_meta_box
		 * Inherited from the class FactoryMetabox.
		 *
		 * @since 1.0.0
		 * @var string
		 */
		public $context = 'side';

		public $id = "OPanda_MoreFeaturesMetaBox";

		public $cssClass = 'factory-bootstrap-000 factory-fontawesome-000 opanda-more-features';

		public function __construct($plugin)
		{
			parent::__construct($plugin);

			$this->title = __('More Features?', 'bizpanda-social-locker');
		}

		/**
		 * Renders content of the metabox.
		 *
		 * @see FactoryMetaboxes000_Metabox
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function html()
		{
			global $sociallocker;
			$alreadyActivated = get_option('onp_trial_activated_' . $sociallocker->pluginName, false);

			if( onp_lang('ru_RU') ) {
				$alreadyActivated = true;
			}

			/*@mix:place*/
			?>
			<div class="factory-bootstrap-000 factory-fontawesome-000">
				<div class="sl-header">
					<strong><?php _e('More Features?', 'bizpanda-social-locker'); ?></strong>

					<p><?php printf(__('You Use Only %s of Social Locker!', 'bizpanda-social-locker'), '30%'); ?></p>
					<?php if( FACTORY_FLAT_ADMIN ) { ?>
						<div class="progress progress-striped">
							<div class="progress-bar" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
								<span class="sr-only"><?php printf(__('%s Complete', 'bizpanda-social-locker'), '30%'); ?></span>
							</div>
						</div>
					<?php } else { ?>
						<div class="progress progress-danger progress-striped active">
							<div class="bar" style="width: 30%;"></div>
						</div>
					<?php } ?>
				</div>
				<div class="sl-seporator"></div>
				<ul>
					<li><span><?php _e('More Social Buttons (+5)', 'bizpanda-social-locker'); ?></span></li>
					<li><span><?php _e('More Beautiful Themes (+3)', 'bizpanda-social-locker'); ?></span></li>
					<li><span><?php _e('Blurring Effect', 'bizpanda-social-locker'); ?></span></li>
					<li><span><?php _e('Advanced Options (+8)', 'bizpanda-social-locker'); ?></span></li>
					<li><span><?php _e('Premium Support', 'bizpanda-social-locker'); ?></span></li>
				</ul>
				<div class="sl-seporator"></div>

				<?php if( $alreadyActivated || get_option('onp_sl_skip_trial', false) ) { ?>
					<div class="sl-footer">
						<?php echo sprintf(__('<a href="%s" class="btn btn-primary btn-large">Get Premium for $24<br /><span>(it will take a pair of minutes)</span></a>', 'bizpanda-social-locker'), onp_licensing_000_get_purchase_url($sociallocker, 'more-features'), onp_licensing_000_manager_link($sociallocker->pluginName, 'activateTrial', false)); ?>
					</div>
				<?php } else { ?>
					<div class="sl-footer">
						<?php echo sprintf(__('<a href="%s" class="btn btn-primary btn-large">Try 7-days Trial Version<br /><span>(activate by one click)</span></a><a href="%s" class="sl-buy"> or <strong>buy</strong> the full premium version now!</a>', 'bizpanda-social-locker'), onp_licensing_000_manager_link($sociallocker->pluginName, 'activateTrial', false), onp_licensing_000_get_purchase_url($sociallocker, 'more-features')); ?>
					</div>
				<?php } ?>

				<div style="display: none">
					<div class="demo-social-options"></div>
					<div class="demo-themes"></div>
					<div class="demo-blurring-effect"></div>
					<div class="demo-advanced-options"></div>
				</div>
			</div>
		<?php
		}
	}

	FactoryMetaboxes000::register('OPanda_SocialLockerMoreFeaturesMetaBox', $bizpanda);
/*@mix:place*/
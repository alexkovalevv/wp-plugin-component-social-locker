<?php
	/**
	 * The file contains a class to configure the metabox Social Options.
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
	 * The class configure the metabox Social Options.
	 *
	 * @since 1.0.0
	 */
	class OPanda_SocialOptionsMetaBox extends FactoryMetaboxes000_FormMetabox {
		
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
		 * A prefix that will be used for names of input fields in the form.
		 *
		 * Inherited from the class FactoryFormMetabox.
		 *
		 * @since 1.0.0
		 * @var string
		 */
		public $scope = 'opanda';
		
		/**
		 * The priority within the context where the boxes should show ('high', 'core', 'default' or 'low').
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_meta_box
		 * Inherited from the class FactoryMetabox.
		 *
		 * @since 1.0.0
		 * @var string
		 */
		public $priority = 'core';
		
		public $cssClass = 'factory-bootstrap-000 factory-fontawesome-000';
		
		public function __construct($plugin)
		{
			parent::__construct($plugin);
			
			$this->title = __('Social Options', 'bizpanda-social-locker');
		}

		/**
		 * Configures a metabox.
		 */
		public function configure($scripts, $styles)
		{
			$styles->add(BIZPANDA_SOCIAL_LOCKER_URL . '/admin/assets/css/social-options.010001.css');
			$scripts->add(BIZPANDA_SOCIAL_LOCKER_URL . '/admin/assets/js/social-options.010001.js');
		}

		/**
		 * Configures a form that will be inside the metabox.
		 *
		 * @see FactoryMetaboxes000_FormMetabox
		 * @since 1.0.0
		 *
		 * @param FactoryForms000_Form $form A form object to configure.
		 * @return void
		 */
		public function form($form)
		{
			require_once OPANDA_BIZPANDA_DIR . '/admin/includes/plugins.php';

			$tabs = array(
				'type' => 'tab',
				'align' => 'vertical',
				'class' => 'social-settings-tab',
				'items' => array()
			);

			$facebookIsActiveByDefault = true;
			$twitterActiveByDefault = true;
			$googleIsActiveByDefault = true;

			// if the user has not updated the facebook app id, show a notice
			$facebookAppId = get_option('opanda_facebook_appid', '117100935120196');
			$googleClientId = get_option('opanda_google_client_id', false);

			// - Facebook Like Tab

			$tabs['items'][] = array(
				'type' => 'tab-item',
				'name' => 'facebook-like',
				'items' => array(
					array(
						'type' => 'checkbox',
						'way' => 'buttons',
						'title' => __('Available', 'bizpanda-social-locker'),
						'hint' => __('Set On, to activate the button.', 'bizpanda-social-locker'),
						'name' => 'facebook-like_available',
						'default' => $facebookIsActiveByDefault
					),
					array(
						'type' => 'url',
						'title' => __('URL to like', 'bizpanda-social-locker'),
						'hint' => __('Set an URL (a facebook page or website page) which the user has to like in order to unlock your content. Leave this field empty to use an URL of the page where the locker will be located.', 'bizpanda-social-locker'),
						'name' => 'facebook_like_url'
					),
					array(
						'type' => 'textbox',
						'title' => __('Button Title', 'bizpanda-social-locker'),
						'hint' => __('Optional. A title of the button that is situated on the covers in the themes "Secrets" and "Flat".', 'bizpanda-social-locker'),
						'name' => 'facebook_like_title',
						'default' => __('like', 'bizpanda-social-locker')
					),
					array(
						'type' => 'more-link',
						'name' => 'like-button-options',
						'title' => __('Show more options', 'bizpanda-social-locker'),
						'count' => 1,
						'items' => array(

							array(
								'type' => 'checkbox',
								'way' => 'buttons',
								'title' => __('I see the "confirm" link after a like', 'bizpanda-social-locker'),
								'hint' => __('<p style="margin-top: 8px;">Optional. Facebook has an automatic Like-spam protection that happens if the Like button gets clicked a lot (for example, while testing the plugin). Don\'t worry, it will go away automatically within some hours/days.</p><p>Just during the time, when Facebook asks to confirm likes on your website, turn on this option and the locker will wait the confirmation to unlock the content.</p>', 'bizpanda-social-locker'),
								'name' => 'facebook_like_confirm_issue',
								'default' => false
							)
						)
					)
				)
			);

			/*@mix:place*/

			// - Twitter Tweet Tab

			$tabs['items'][] = array(
				'type' => 'tab-item',
				'title' => '',
				'name' => 'twitter-tweet',
				'items' => array(

					array(
						'type' => 'checkbox',
						'way' => 'buttons',
						'title' => __('Available', 'bizpanda-social-locker'),
						'hint' => __('Set On, to activate the button.', 'bizpanda-social-locker'),
						'name' => 'twitter-tweet_available',
						'default' => $twitterActiveByDefault
					),
					array(
						'type' => 'url',
						'title' => __('URL to tweet', 'bizpanda-social-locker'),
						'hint' => __('Set an URL which the user has to tweet in order to unlock your content. Leave this field empty to use an URL of the page where the locker will be located.', 'bizpanda-social-locker'),
						'name' => 'twitter_tweet_url'
					),
					array(
						'type' => 'textarea',
						'title' => __('Tweet', 'bizpanda-social-locker'),
						'hint' => __('Type a message to tweet. Leave this field empty to use default tweet (page title + URL). Also you can use the shortcode [post_title] in order to insert automatically a post title into the tweet.', 'bizpanda-social-locker'),
						'name' => 'twitter_tweet_text'
					),
					array(
						'type' => 'checkbox',
						'way' => 'buttons',
						'title' => __('Double Check', 'bizpanda-social-locker'),
						'hint' => __('Optional. Checks whether the user actually has tweeted or not. Requires the user to authorize the BizPanda app.', 'bizpanda-social-locker'),
						'default' => true,
						'name' => 'twitter_tweet_auth'
					),
					array(
						'type' => 'textbox',
						'title' => __('Via', 'bizpanda-social-locker'),
						'hint' => __('Optional. Screen name of the user to attribute the Tweet to (without @).', 'bizpanda-social-locker'),
						'name' => 'twitter_tweet_via'
					),
					array(
						'type' => 'textbox',
						'title' => __('Button Title', 'bizpanda-social-locker'),
						'hint' => __('Optional. A title of the button that is situated on the covers in the themes "Secrets" and "Flat".', 'bizpanda-social-locker'),
						'name' => 'twitter_tweet_title',
						'default' => __('tweet', 'bizpanda-social-locker')
					),

				)
			);

			// - Google Plus Tab

			$tabs['items'][] = array(
				'type' => 'tab-item',
				'name' => 'google-plus',
				'items' => array(
					array(
						'off' => !empty($googleClientId),
						'type' => 'html',
						'html' => '<div class="alert alert-warning">' . sprintf(__('<strong>Warning:</strong> The Google +1 button started working as the Google Share button <a target="_blank" href="https://plus.google.com/110610523830483756510/posts/Z1FfzduveUo">since 15 June 2017</a>.<br />Please make sure that you <a href="%s">set a Google Client ID</a> for your domain, otherwise the button will not work correctly.', 'bizpanda-social-locker'), opanda_get_settings_url('social')) . '</div>'
					),
					array(
						'off' => empty($googleClientId),
						'type' => 'html',
						'html' => '<div class="alert alert-warning">' . sprintf(__('<strong>Note:</strong> The Google +1 button started working as the Google Share button <a target="_blank" href="https://plus.google.com/110610523830483756510/posts/Z1FfzduveUo">since 15 June 2017</a>.', 'bizpanda-social-locker'), opanda_get_settings_url('social')) . '</div>'
					),
					array(
						'type' => 'checkbox',
						'way' => 'buttons',
						'title' => __('Available', 'bizpanda-social-locker'),
						'hint' => __('Set On, to activate the button.', 'bizpanda-social-locker'),
						'name' => 'google-plus_available',
						'default' => $googleIsActiveByDefault
					),
					array(
						'type' => 'url',
						'title' => __('URL to +1', 'bizpanda-social-locker'),
						'hint' => __('Set an URL which the user has to +1 in order to unlock your content. Leave this field empty to use an URL of the page where the locker will be located.', 'bizpanda-social-locker'),
						'name' => 'google_plus_url'
					),
					array(
						'type' => 'textarea',
						'title' => __('Prefilled Comment', 'bizpanda-social-locker'),
						'hint' => __('Type a message which will be prefilled in the comment box. Also you can use the shortcode [post_title] in order to insert automatically a post title into the comment.', 'bizpanda-social-locker'),
						'name' => 'google_plus_text'
					),
					array(
						'type' => 'textbox',
						'title' => __('Button Title', 'bizpanda-social-locker'),
						'hint' => __('Optional. A title of the button that is situated on the covers in the themes "Secrets" and "Flat".', 'bizpanda-social-locker'),
						'name' => 'google_plus_title',
						'default' => __('+1 us', 'bizpanda-social-locker')
					)
				)
			);

			if( onp_build('free') ) {

				// - Facebook Share Tab

				$tabs['items'][] = array(
					'type' => 'tab-item',
					'name' => 'facebook-share',
					'items' => array(
						array(
							'type' => 'checkbox',
							'way' => 'buttons',
							'title' => __('Available', 'bizpanda-social-locker'),
							'hint' => __('Set On, to activate the button.', 'bizpanda-social-locker'),
							'name' => 'facebook-share_available',
							'default' => false
						),
						array(
							'type' => 'url',
							'title' => __('URL to share', 'bizpanda-social-locker'),
							'hint' => __('Set an URL which the user has to share in order to unlock your content. Leave this field empty to use an URL of the page where the locker will be located.', 'bizpanda-social-locker'),
							'name' => 'facebook_fake_field_1'
						),
						array(
							'type' => 'textbox',
							'title' => __('Button Title', 'bizpanda-social-locker'),
							'hint' => __('Optional. A title of the button that is situated on the covers in the themes "Secrets" and "Flat".', 'bizpanda-social-locker'),
							'name' => 'facebook_fake_field_2',
							'default' => __('share', 'bizpanda-social-locker')
						)
					)
				);

				// - Twitter Follow Tab

				$tabs['items'][] = array(
					'type' => 'tab-item',
					'name' => 'twitter-follow',
					'items' => array(

						array(
							'type' => 'checkbox',
							'way' => 'buttons',
							'title' => __('Available', 'bizpanda-social-locker'),
							'hint' => __('Set On, to activate the button.', 'bizpanda-social-locker'),
							'name' => 'twitter-follow_available',
							'default' => false
						),
						array(
							'type' => 'url',
							'title' => __('User to follow', 'bizpanda-social-locker'),
							'hint' => __('Set an URL of your Twitter profile (for example, <a href="https://twitter.com/byonepress" target="_blank">https://twitter.com/byonepress</a>).', 'bizpanda-social-locker'),
							'name' => 'twiiter_fake_field_1'
						),
						array(
							'type' => 'checkbox',
							'way' => 'buttons',
							'title' => __('Hide Username', 'bizpanda-social-locker'),
							'hint' => __('Set On to hide your username on the button (makes the button shorter).', 'bizpanda-social-locker'),
							'name' => 'twiiter_fake_field_2'
						),
						array(
							'type' => 'textbox',
							'title' => __('Button Title', 'bizpanda-social-locker'),
							'hint' => __('Optional. A title of the button that is situated on the covers in the themes "Secrets" and "Flat".', 'bizpanda-social-locker'),
							'name' => 'twiiter_fake_field_3',
							'default' => __('follow us', 'bizpanda-social-locker')
						)
					)
				);

				// - Google Share Tab

				$tabs['items'][] = array(
					'type' => 'tab-item',
					'name' => 'google-share',
					'items' => array(
						array(
							'type' => 'checkbox',
							'way' => 'buttons',
							'title' => __('Available', 'bizpanda-social-locker'),
							'hint' => __('Set On, to activate the button.', 'bizpanda-social-locker'),
							'name' => 'google-share_available'
						),
						array(
							'type' => 'url',
							'title' => __('URL to share', 'bizpanda-social-locker'),
							'hint' => __('Set an URL which the user has to share in order to unlock your content. Leave this field empty to use an URL of the page where the locker will be located.', 'bizpanda-social-locker'),
							'name' => 'google_fake_field_1'
						),
						array(
							'type' => 'textbox',
							'title' => __('Button Title', 'bizpanda-social-locker'),
							'hint' => __('Optional. A title of the button that is situated on the covers in the themes "Secrets" and "Flat".', 'bizpanda-social-locker'),
							'name' => 'google_fake_field_2',
							'default' => __('share', 'bizpanda-social-locker')
						)
					)
				);

				// - Youtube Subscribe

				$tabs['items'][] = array(
					'type' => 'tab-item',
					'name' => 'youtube-subscribe',
					'items' => array(
						array(
							'type' => 'checkbox',
							'way' => 'buttons',
							'title' => __('Available', 'bizpanda-social-locker'),
							'hint' => __('Set On, to activate the button.', 'bizpanda-social-locker'),
							'name' => 'youtube-subscribe_available',
							'default' => false
						),
						array(
							'type' => 'textbox',
							'title' => __('Channel ID', 'bizpanda-social-locker'),
							'hint' => __('Set a channel ID to subscribe (for example, <a href="http://www.youtube.com/channel/UCANLZYMidaCbLQFWXBC95Jg" target="_blank">UCANLZYMidaCbLQFWXBC95Jg</a>).', 'bizpanda-social-locker'),
							'name' => 'youtube_fake_field_2'
						),
						array(
							'type' => 'textbox',
							'title' => __('Button Title', 'bizpanda-social-locker'),
							'hint' => __('Optional. A visible title of the buttons that is used in some themes (by default only in the Secrets theme).', 'bizpanda-social-locker'),
							'name' => 'youtube_fake_field_3',
							'default' => __('Youtube', 'bizpanda-social-locker')
						)
					)
				);

				// - LinkedIn Share Tab

				$tabs['items'][] = array(
					'type' => 'tab-item',
					'name' => 'linkedin-share',
					'items' => array(

						array(
							'type' => 'checkbox',
							'way' => 'buttons',
							'title' => __('Available', 'bizpanda-social-locker'),
							'hint' => __('Set On, to activate the button.', 'bizpanda-social-locker'),
							'name' => 'linkedin-share_available',
							'default' => false
						),
						array(
							'type' => 'url',
							'title' => __('URL to share', 'bizpanda-social-locker'),
							'hint' => __('Set an URL which the user has to share in order to unlock your content. Leave this field empty to use an URL of the page where the locker will be located.', 'bizpanda-social-locker'),
							'name' => 'linkedin_fake_field_1'
						),
						array(
							'type' => 'textbox',
							'title' => __('Button Title', 'bizpanda-social-locker'),
							'hint' => __('Optional. A title of the button that is situated on the covers in the themes "Secrets" and "Flat".', 'bizpanda-social-locker'),
							'name' => 'linkedin_fake_field_2',
							'default' => __('share', 'bizpanda-social-locker')
						)
					)
				);
			} else {

				// - Facebook Share Tab

				$tabs['items'][] = array(
					'type' => 'tab-item',
					'name' => 'facebook-share',
					'items' => array(
						array(
							'off' => !(empty($facebookAppId) || $facebookAppId == '117100935120196'),
							'type' => 'html',
							'html' => '<div class="alert alert-warning">' . sprintf(__('Please make sure that you <a href="%s">set a facebook app id</a> for your domain, otherwise the button will not work. The Facebook Share button requires an app id registered for a domain where it\'s used.', 'bizpanda-social-locker'), opanda_get_settings_url('social')) . '</div>'
						),
						array(
							'type' => 'checkbox',
							'way' => 'buttons',
							'title' => __('Available', 'bizpanda-social-locker'),
							'hint' => __('Set On, to activate the button.', 'bizpanda-social-locker'),
							'name' => 'facebook-share_available',
							'default' => false
						),
						array(
							'type' => 'url',
							'title' => __('URL to share', 'bizpanda-social-locker'),
							'hint' => __('Set an URL which the user has to share in order to unlock your content. Leave this field empty to use an URL of the page where the locker will be located.', 'bizpanda-social-locker'),
							'name' => 'facebook_share_url'
						),
						array(
							'type' => 'checkbox',
							'way' => 'buttons',
							'title' => __('Use Facebook Share Dialog', 'bizpanda-social-locker'),
							'hint' => __('Optional. Set On to use the Facebook Share Dialog instead of the Facebook Feed Dialog. Use the <A href="http://davidwalsh.name/facebook-meta-tags" target="_blank">Open Graph Meta Tags</a> to specify the message to share. You can specify these tags via a plenty of free plugins (for example, via <a href="https://wordpress.org/plugins/wordpress-seo/" target="_blank">Yoast SEO</a>).', 'bizpanda-social-locker'),
							'name' => 'facebook_share_dialog',
							'default' => false
						),
						array(
							'type' => 'textbox',
							'title' => __('Button Title', 'bizpanda-social-locker'),
							'hint' => __('Optional. A title of the button that is situated on the covers in the themes "Secrets" and "Flat".', 'bizpanda-social-locker'),
							'name' => 'facebook_share_title',
							'default' => __('share', 'bizpanda-social-locker')
						)
					)
				);

				// - Twitter Follow Tab

				$tabs['items'][] = array(
					'type' => 'tab-item',
					'name' => 'twitter-follow',
					'items' => array(

						array(
							'type' => 'checkbox',
							'way' => 'buttons',
							'title' => __('Available', 'bizpanda-social-locker'),
							'hint' => __('Set On, to activate the button.', 'bizpanda-social-locker'),
							'name' => 'twitter-follow_available',
							'default' => false
						),
						array(
							'type' => 'url',
							'title' => __('User to Follow', 'bizpanda-social-locker'),
							'hint' => __('Set an URL of your Twitter profile (for example, <a href="https://twitter.com/byonepress" target="_blank">https://twitter.com/byonepress</a>).', 'bizpanda-social-locker'),
							'name' => 'twitter_follow_url'
						),
						array(
							'type' => 'checkbox',
							'way' => 'buttons',
							'title' => __('Double Check', 'bizpanda-social-locker'),
							'hint' => __('Optional. Checks whether the user actually has followed you or not. Requires the user to authorize the BizPanda app.', 'bizpanda-social-locker'),
							'name' => 'twitter_follow_auth'
						),
						array(
							'type' => 'checkbox',
							'way' => 'buttons',
							'title' => __('Hide Username', 'bizpanda-social-locker'),
							'hint' => __('Set On to hide your username on the button (makes the button shorter).', 'bizpanda-social-locker'),
							'name' => 'twitter_follow_hide_name'
						),
						array(
							'type' => 'textbox',
							'title' => __('Button Title', 'bizpanda-social-locker'),
							'hint' => __('Optional. A title of the button that is situated on the covers in the themes "Secrets" and "Flat".', 'bizpanda-social-locker'),
							'name' => 'twitter_follow_title',
							'default' => __('follow us', 'bizpanda-social-locker')
						)
					)
				);

				// - Google Share Tab

				$tabs['items'][] = array(
					'type' => 'tab-item',
					'name' => 'google-share',
					'items' => array(
						array(
							'off' => !empty($googleClientId),
							'type' => 'html',
							'html' => '<div class="alert alert-warning">' . sprintf(__('Please make sure that you <a href="%s">set a Google Client ID</a> for your domain, otherwise the button will not work correctly.', 'bizpanda-social-locker'), opanda_get_settings_url('social')) . '</div>'
						),
						array(
							'type' => 'checkbox',
							'way' => 'buttons',
							'title' => __('Available', 'bizpanda-social-locker'),
							'hint' => __('Set On, to activate the button.', 'bizpanda-social-locker'),
							'name' => 'google-share_available'
						),
						array(
							'type' => 'url',
							'title' => __('URL to share', 'bizpanda-social-locker'),
							'hint' => __('Set an URL which the user has to share in order to unlock your content. Leave this field empty to use an URL of the page where the locker will be located.', 'bizpanda-social-locker'),
							'name' => 'google_share_url'
						),
						array(
							'type' => 'textarea',
							'title' => __('Prefilled Comment', 'bizpanda-social-locker'),
							'hint' => __('Type a message which will be prefilled in the comment box. Also you can use the shortcode [post_title] in order to insert automatically a post title into the comment.', 'bizpanda-social-locker'),
							'name' => 'google_share_text'
						),
						array(
							'type' => 'textbox',
							'title' => __('Button Title', 'bizpanda-social-locker'),
							'hint' => __('Optional. A title of the button that is situated on the covers in the themes "Secrets" and "Flat".', 'bizpanda-social-locker'),
							'name' => 'google_share_title',
							'default' => __('share', 'bizpanda-social-locker')
						)
					)
				);

				// - YouTube Subscribe

				// if the user has not set the cliend id, show a notice
				$googleClientId = get_option('opanda_google_client_id', false);

				$tabs['items'][] = array(
					'type' => 'tab-item',
					'name' => 'youtube-subscribe',
					'items' => array(
						array(
							'off' => !empty($googleClientId),
							'type' => 'html',
							'html' => '<div class="alert alert-warning">' . sprintf(__(' The YouTube Button requires the Google Client ID linked to your domain. Before using the button, please <a href="%s" target="_blank">set the Client ID</a>.', 'bizpanda-social-locker'), opanda_get_settings_url('social')) . '</div>'
						),
						array(
							'type' => 'checkbox',
							'way' => 'buttons',
							'title' => __('Available', 'bizpanda-social-locker'),
							'hint' => __('Set On, to activate the button.', 'bizpanda-social-locker'),
							'name' => 'youtube-subscribe_available',
							'default' => false
						),
						array(
							'type' => 'textbox',
							'title' => __('Channel ID', 'bizpanda-social-locker'),
							'hint' => __('Set a channel ID to subscribe (for example, <a href="http://www.youtube.com/channel/UCANLZYMidaCbLQFWXBC95Jg" target="_blank">UCANLZYMidaCbLQFWXBC95Jg</a>).', 'bizpanda-social-locker'),
							'name' => 'google_youtube_channel_id'
						),
						array(
							'type' => 'textbox',
							'title' => __('Button Title', 'bizpanda-social-locker'),
							'hint' => __('Optional. A visible title of the buttons that is used in some themes (by default only in the Secrets theme).', 'bizpanda-social-locker'),
							'name' => 'google_youtube_title',
							'default' => __('Youtube', 'bizpanda-social-locker')
						)
					)
				);

				// - LinkedIn Share Tab

				$tabs['items'][] = array(
					'type' => 'tab-item',
					'name' => 'linkedin-share',
					'items' => array(

						array(
							'type' => 'html',
							'html' => '<div class="alert alert-warning">' . __('<strong>Warning:</strong> due to the technical bug on the LinkedIn side, the locked content may be accessible for visitors who close the share dialog without actual sharing.', 'bizpanda-social-locker') . '</div>'
						),
						array(
							'type' => 'checkbox',
							'way' => 'buttons',
							'title' => __('Available', 'bizpanda-social-locker'),
							'hint' => __('Set On, to activate the button.', 'bizpanda-social-locker'),
							'name' => 'linkedin-share_available',
							'default' => false
						),
						array(
							'type' => 'url',
							'title' => __('URL to share', 'bizpanda-social-locker'),
							'hint' => __('Set an URL which the user has to share in order to unlock your content. Leave this field empty to use an URL of the page where the locker will be located.', 'bizpanda-social-locker'),
							'name' => 'linkedin_share_url'
						),
						array(
							'type' => 'textbox',
							'title' => __('Button Title', 'bizpanda-social-locker'),
							'hint' => __('Optional. A title of the button that is situated on the covers in the themes "Secrets" and "Flat".', 'bizpanda-social-locker'),
							'name' => 'linkedin_share_title',
							'default' => __('share', 'bizpanda-social-locker')
						)
					)
				);
			}

			$tabs = apply_filters('onp_sl_social_options', $tabs);

			if( onp_build('free') ) {

				$allowed = apply_filters('onp_sl_social_options_free_buttons', array(
					'facebook-like',
					'twitter-tweet',
					'google-plus'
				));

				foreach($tabs['items'] as $index => $tabItem) {
					if( in_array($tabItem['name'], $allowed) ) {
						continue;
					}
					$tabs['items'][$index]['items'][0]['value'] = false;
					$tabs['items'][$index]['items'][1]['value'] = false;
					$tabs['items'][$index]['cssClass'] = 'opanda-not-available';

					$tabs['items'][$index]['items'][] = array(
						'type' => 'html',
						'html' => opanda_get_premium_note(true, 'social-buttons')
					);
				}
			}

			$defaultOrder = array();

			if( $facebookIsActiveByDefault ) {
				$defaultOrder[] = 'facebook-like';
			}
			if( $twitterActiveByDefault ) {
				$defaultOrder[] = 'twitter-tweet';
			}
			if( $googleIsActiveByDefault ) {
				$defaultOrder[] = 'google-plus';
			}

			$form->add(array(

				array(
					'type' => 'checkbox',
					'way' => 'buttons',
					'name' => 'show_counters',
					'title' => __('Show counters', 'bizpanda-social-locker'),
					'default' => true
				),
				array(
					'type' => 'html',
					'html' => '<div class="onp-sl-metabox-hint">
                                <strong>' . __('Hint', 'bizpanda-social-locker') . '</strong>: ' . __('Drag and drop the tabs to change the order of the buttons.', 'bizpanda-social-locker') . '</div>'
				),
				array(
					'type' => 'hidden',
					'name' => 'buttons_order',
					'default' => implode(',', $defaultOrder)
				),
				$tabs
			));
		}
	}
	
	FactoryMetaboxes000::register('OPanda_SocialOptionsMetaBox', $bizpanda);
	/*@mix:place*/
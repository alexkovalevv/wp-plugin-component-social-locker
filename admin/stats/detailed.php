<?php


	class OPanda_SocialLocker_Detailed_StatsTable extends OPanda_StatsTable {

		public function getColumns()
		{
			$table = array(
				'index' => array(
					'title' => ''
				),
				'title' => array(
					'title' => __('Post Title', 'bizpanda-social-locker')
				),
				'unlock' => array(
					'title' => __('Total', 'bizpanda-social-locker'),
					'hint' => __('The total number of unlocks made by visitors.', 'bizpanda-social-locker'),
					'highlight' => true,
					'cssClass' => 'opanda-col-number'
				),
				'channels' => array(
					'title' => __('Unlocks Via', 'bizpanda-social-locker'),
					'cssClass' => 'opanda-col-common',
					'columns' => array(
						'unlock-via-facebook-like' => array(
							'title' => __('FB Like', 'bizpanda-social-locker'),
							'cssClass' => 'opanda-col-number'
						),
						'unlock-via-facebook-share' => array(
							'title' => __('FB Share', 'bizpanda-social-locker'),
							'cssClass' => 'opanda-col-number'
						),
						'unlock-via-twitter-tweet' => array(
							'title' => __('Twitter Tweet', 'bizpanda-social-locker'),
							'cssClass' => 'opanda-col-number'
						),
						'unlock-via-twitter-follow' => array(
							'title' => __('Twitter Follow', 'bizpanda-social-locker'),
							'cssClass' => 'opanda-col-number'
						),
						'unlock-via-google-plus' => array(
							'title' => __('Google +1s', 'bizpanda-social-locker'),
							'cssClass' => 'opanda-col-number'
						),
						'unlock-via-google-share' => array(
							'title' => __('Google Share', 'bizpanda-social-locker'),
							'cssClass' => 'opanda-col-number'
						),
						'unlock-via-google-youtube' => array(
							'title' => __('YouTube', 'bizpanda-social-locker'),
							'cssClass' => 'opanda-col-number'
						),
						'unlock-via-linkedin-share' => array(
							'title' => __('LinkedIn Share', 'bizpanda-social-locker'),
							'cssClass' => 'opanda-col-number'
						)
					)
				)
			);

			$table = apply_filters('onp_sl_detailed_stats_table', $table);

			return $table;
		}
	}

	class OPanda_SocialLocker_Detailed_StatsChart extends OPanda_StatsChart {

		public $type = 'line';

		public function getFields()
		{
			$channels = array(
				'aggregate_date' => array(
					'title' => __('Date', 'bizpanda-social-locker')
				),
				'unlock-via-facebook-like' => array(
					'title' => __('FB Likes', 'bizpanda-social-locker'),
					'color' => '#7089be'
				),
				'unlock-via-facebook-share' => array(
					'title' => __('FB Shares', 'bizpanda-social-locker'),
					'color' => '#566a93'
				),
				'unlock-via-twitter-tweet' => array(
					'title' => __('Tweets', 'bizpanda-social-locker'),
					'color' => '#3ab9e9'
				),
				'unlock-via-twitter-follow' => array(
					'title' => __('Twitter Followers', 'bizpanda-social-locker'),
					'color' => '#1c95c3'
				),
				'unlock-via-google-plus' => array(
					'title' => __('Google +1s', 'bizpanda-social-locker'),
					'color' => '#e26f61'
				),
				'unlock-via-google-share' => array(
					'title' => __('Google Shares', 'bizpanda-social-locker'),
					'color' => '#ba5145'
				),
				'unlock-via-google-youtube' => array(
					'title' => __('YouTube', 'bizpanda-social-locker'),
					'color' => '#8f352b'
				),
				'unlock-via-linkedin-share' => array(
					'title' => __('LinkedIn Shares', 'bizpanda-social-locker'),
					'color' => '#006080'
				)
			);

			$channels = apply_filters('onp_sl_detailed_stats_chart', $channels);

			return $channels;
		}
	}
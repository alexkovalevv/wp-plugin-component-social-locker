<?php


	class OPanda_SocialLocker_Skips_StatsTable extends OPanda_StatsTable {

		public function getColumns()
		{

			return array(
				'index' => array(
					'title' => ''
				),
				'title' => array(
					'title' => __('Post Title', 'bizpanda-social-locker')
				),
				'unlock' => array(
					'title' => __('Number of Unlocks', 'bizpanda-social-locker'),
					'hint' => __('The number of unlocks made by visitors.', 'bizpanda-social-locker'),
					'highlight' => true,
					'cssClass' => 'opanda-col-number'
				),
				'skip-via-timer' => array(
					'title' => __('Skipped by Timer', 'bizpanda-social-locker'),
					'cssClass' => 'opanda-col-number'

				),
				'skip-via-cross' => array(
					'title' => __('Skipped by Close Icon', 'bizpanda-social-locker'),
					'cssClass' => 'opanda-col-number'
				)
			);
		}
	}

	class OPanda_SocialLocker_Skips_StatsChart extends OPanda_StatsChart {

		public $type = 'column';

		public function getFields()
		{

			return array(
				'aggregate_date' => array(
					'title' => __('Date', 'bizpanda-social-locker')
				),
				'unlock' => array(
					'title' => __('Number of Unlocks', 'bizpanda-social-locker'),
					'color' => '#0074a2'
				),
				'skip-via-timer' => array(
					'title' => __('Skipped by Timer', 'bizpanda-social-locker'),
					'color' => '#333333'

				),
				'skip-via-cross' => array(
					'title' => __('Skipped by Close Icon', 'bizpanda-social-locker'),
					'color' => '#dddddd'
				)
			);
		}
	}
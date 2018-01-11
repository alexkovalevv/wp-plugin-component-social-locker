<?php


	class OPanda_SocialLocker_Summary_StatsTable extends OPanda_StatsTable {

		public function getColumns()
		{

			return array(
				'index' => array(
					'title' => ''
				),
				'title' => array(
					'title' => __('Post Title', 'bizpanda-social-locker')
				),
				'impress' => array(
					'title' => __('Impressions', 'bizpanda-social-locker'),
					'cssClass' => 'opanda-col-number'
				),
				'unlock' => array(
					'title' => __('Number of Unlocks', 'bizpanda-social-locker'),
					'hint' => __('The number of unlocks made by visitors.', 'bizpanda-social-locker'),
					'highlight' => true,
					'cssClass' => 'opanda-col-number'
				),
				'conversion' => array(
					'title' => __('Conversion', 'bizpanda-social-locker'),
					'hint' => __('The ratio of the number of unlocks to impressions, in percentage.', 'bizpanda-social-locker'),
					'cssClass' => 'opanda-col-number'
				)
			);
		}
	}

	class OPanda_SocialLocker_Summary_StatsChart extends OPanda_StatsChart {

		public function getSelectors()
		{
			return null;
		}

		public function getFields()
		{

			return array(
				'aggregate_date' => array(
					'title' => __('Date', 'bizpanda-social-locker')
				),
				'unlock' => array(
					'title' => __('Number of Unlocks', 'bizpanda-social-locker'),
					'color' => '#0074a2'
				)
			);
		}
	}
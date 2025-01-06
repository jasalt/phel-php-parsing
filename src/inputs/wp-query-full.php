<?php

// Ref: https://www.billerickson.net/code/wp_query-arguments/
// WP_Query args meta_query

[
	'post_type' => $fields['crb_bulletin_active_post_types'],
	'meta_query' => [  // TODO narrow down to ones with bulletin set
		'relation' => 'AND',
		[
			'key' => 'cf_bulletin_enabled',
			'value' => 'yes'
		],
		[
			'relation' => 'OR',
			[
				'key' => 'cf_pinned_until',
				'value' => '',
				'compare' => '='
			],
			[
				'key' => 'cf_pinned_until',
				'value' => date('Y-m-d', strtotime('-1 day')), // includes today's bulletins
				//'value' => date('Y-m-d'), // today's not included
				'compare' => '>',
				'type' => 'DATETIME'
			]
		]
	],
];

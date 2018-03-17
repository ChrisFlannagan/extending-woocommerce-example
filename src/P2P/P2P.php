<?php

namespace Flanny_Shop\P2P;

class P2P {
	const PACKAGE_TO_PRODUCT = 'bundle_to_product';

	public static function register_connections() {

		p2p_register_connection_type( [
			'name' => self::PACKAGE_TO_PRODUCT,
			'from' => 'product',
			'to' => 'product',
			'admin_box' => [
				'show' => 'from',
			],
			'title' => [
				'from' => __( 'Make A Bundle', 'flanny-shop' ),
			],
			'from_labels' => [
				'singular_name' => __( 'Bundle', 'flanny-shop' ),
				'search_items' => __( 'Search Bundles', 'flanny-shop' ),
				'not_found' => __( 'No Bundles found.', 'flanny-shop' ),
				'create' => __( 'Add Products To Bundle', 'flanny-shop' ),
			],
			'to_labels' => [
				'singular_name' => __( 'Included Product', 'flanny-shop' ),
				'search_items' => __( 'Search Included Products', 'flanny-shop' ),
				'not_found' => __( 'No Included Products found.', 'flanny-shop' ),
				'create' => __( 'Make A Bundle', 'flanny-shop' ),
			],
		] );

	}

}
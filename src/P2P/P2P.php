<?php

namespace Flanny_Shop\P2P;

class P2P {
	const PACKAGE_TO_PRODUCT = 'package_to_product';

	public static function register_connections() {

		p2p_register_connection_type( [
			'name' => 'package_to_product',
			'from' => 'product',
			'to' => 'product'
		] );

	}
}
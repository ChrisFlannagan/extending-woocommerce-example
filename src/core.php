<?php

namespace Flanny_Shop;

use Flanny_Shop\Providers\P2P_Provider;
use Flanny_Shop\Providers\WooCommerce_Provider;

/**
 * Class Core
 * @package Flanny_Shop
 *
 * This is the core of the Flanny Shop WooCommerce plugin
 *
 * init() is out basic service provider for all components
 */
class Core {

	public static function init() {
		/** Bail if we don't have required plugin */
		if ( ! function_exists( '_p2p_init' ) ) {
			return;
		}

		$p2p = new P2P_Provider();
		$woocommerce = new WooCommerce_Provider();
	}

}
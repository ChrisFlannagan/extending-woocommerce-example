<?php

namespace Flanny_Shop;

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

		add_action( 'p2p_init', [ '\\Flanny_Shop\\P2P\\P2P', 'register_connections' ] );
	}

}
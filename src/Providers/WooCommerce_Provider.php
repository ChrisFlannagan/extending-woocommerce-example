<?php

namespace Flanny_Shop\Providers;

use Flanny_Shop\WooCommerce\Cart;
use Flanny_Shop\WooCommerce\Checkout;
use Flanny_Shop\WooCommerce\Shop;

/**
 * Class WooCommerce_Provider
 * @package Flanny_Shop\Providers
 */
class WooCommerce_Provider {

	private $cart;
	private $checkout;
	private $shop;

	public function __construct() {
		$this->instances();
		$this->hook();
	}

	private function instances() {
		$this->cart = new Cart();
		$this->checkout = new Checkout();
		$this->shop = new Shop();
	}

	private function hook() {

		add_action( 'woocommerce_cart_item_name', function( $item_name, $item, $cart_key ) {
			return $this->cart->display_bundled_products( $item_name, $item, $cart_key );
		}, 10, 3 );

	}


}
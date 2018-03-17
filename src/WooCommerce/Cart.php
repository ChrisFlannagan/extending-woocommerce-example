<?php

namespace Flanny_Shop\WooCommerce;

use Flanny_Shop\Post_Types\Product;

/**
 * Class Cart
 * @package Flanny_Shop\WooCommerce
 */
class Cart {
	/**
	 * Cart constructor.
	 */
	public function __construct() {
	}

	/**
	 * @param $item_name
	 * @param $item
	 * @param $cart_key
	 *
	 * @return string
	 */
	public function display_bundled_products( $item_name, $item, $cart_key ) {
		$product = new Product( $item['product_id'] );

		if ( ! $product->is_bundle() ) {
			return $item_name;
		}

		$product_ids = $product->get_bundled_product_ids();
		$product_titles = '';
		foreach ( $product_ids as $product_id ) {
			$product_titles .= '<br />- ' . get_the_title( $product_id );
		}

		return $item_name . ' (' . __( 'Bundle', 'flanny-shop' ) . ')' . $product_titles;
	}

}
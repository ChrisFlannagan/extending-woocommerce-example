<?php

namespace Flanny_Shop\WooCommerce;

use Flanny_Shop\P2P\P2P;

/**
 * Class Cart
 * @package Flanny_Shop\WooCommerce
 */
class Cart {

	/**
	 * @param $item_name
	 * @param $item
	 * @param $cart_key
	 *
	 * @return string
	 */
	public function display_bundled_products( $item_name, $item, $cart_key ) {
		global $wpdb;
		$sql = $wpdb->prepare(
			"SELECT p2p_to FROM {$wpdb->p2p} WHERE p2p_from=%d AND p2p_type=%s",
			$item['product_id'],
			P2P::PACKAGE_TO_PRODUCT
		);

		$products = $wpdb->get_col( $sql );

		if ( empty( $products ) ) {
			return $item_name;
		}

		$product_titles = '';
		foreach ( $products as $product_id ) {
			$product_titles .= '<br />- ' . get_the_title( $product_id );
		}

		return $item_name . ' (' . __( 'Bundle', 'flanny-shop' ) . ')' . $product_titles;
	}

}
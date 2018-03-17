<?php

namespace Flanny_Shop\Post_Types;

use Flanny_Shop\P2P\P2P;

/**
 * Class Product
 * @package Flanny_Shop\Post_Types
 */
class Product {

	const NAME = 'product';

	private $woo_product;
	private $product_id;
	private $bundled_product_ids;

	/**
	 * Product constructor.
	 *
	 * @param $product_id
	 */
	public function __construct( $product_id ) {
		$this->product_id = $product_id;
		$this->set_woo_product( $product_id );
	}

	/**
	 * @param int $product_id
	 */
	public function set_woo_product( $product_id = 0 ) {
		$this->woo_product = new \WC_Product();
		$woo_product = new \WC_Product( $product_id );
		if ( $woo_product->is_type( 'simple' ) ) {
			$this->woo_product = new \WC_Product( $product_id );
		}

		if ( $woo_product->is_type( 'variation' ) ) {
			$this->woo_product = new \WC_Product_Variation( $product_id );
		}

		if ( $woo_product->is_type( 'variable' ) ) {
			$this->woo_product = new \WC_Product_Variable( $product_id );
		}
	}

	/**
	 * @return \WC_Product
	 */
	public function get_woo_product() {
		return $this->woo_product;
	}

	/**
	 * @return bool
	 */
	public function is_bundle() {
		if ( ! empty( $this->get_bundled_product_ids() ) ) {
			return true;
		}

		return false;
	}

	/**
	 * @return array
	 */
	public function get_bundled_product_ids() {
		if ( ! empty( $this->bundled_product_ids ) ) {
			return $this->bundled_product_ids;
		}

		global $wpdb;
		$sql = $wpdb->prepare(
			"SELECT p2p_to FROM {$wpdb->p2p} WHERE p2p_from=%d AND p2p_type=%s",
			$this->product_id,
			P2P::PACKAGE_TO_PRODUCT
		);

		$this->bundled_product_ids = $wpdb->get_col( $sql );

		return $this->bundled_product_ids;
	}
}
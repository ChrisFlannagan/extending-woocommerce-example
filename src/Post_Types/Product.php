<?php

namespace Flanny_Shop\Post_Types;

/**
 * Class Product
 * @package Flanny_Shop\Post_Types
 */
class Product {

	const NAME = 'product';

	private $woo_product;

	/**
	 * Product constructor.
	 *
	 * @param $product_id
	 */
	public function __construct( $product_id ) {
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
}
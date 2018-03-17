<?php

/**
 * Plugin Name: Flanny Shop for WooCommerce
 * Author: MrFlannagan
 * Version: 1.0.0
 * text-domain: flanny-shop
 *
 * @TODO: Allow variation selection
 * @TODO: Hook up bundle display on archive and product single WooCommerce/Shop.php
 * @TODO: Hook up replacing bundle with product for proper stock management WooCommerce/Checkout.php
 *
 */

define( 'FLANNY_SHOP_VER', '1.0.0' );
define( 'FLANNY_SHOP_ID', 'flanny-shop' );
define( 'FLANNY_SHOP_PATH',  dirname( __FILE__ ) . '/' );

require 'vendor/autoload.php';

$p2p_include = FLANNY_SHOP_PATH . 'lib/posts-to-posts/posts-to-posts.php';
if ( ! function_exists( '_p2p_init' ) && file_exists( $p2p_include ) ) {
	require_once( $p2p_include );
}

\Flanny_Shop\Core::init();
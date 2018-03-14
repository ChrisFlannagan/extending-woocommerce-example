<?php

/**
 * Plugin Name: Flanny Shop for WooCommerce
 * Author: MrFlannagan
 * Version: 1.0.0
 * text-domain: flanny-shop
 */

define( 'FLANNY_SHOP_VER', '1.0.0' );
define( 'FLANNY_SHOP_ID', 'flanny-shop' );

$p2p_include = 'lib/posts-to-posts/posts-to-posts.php';
if ( ! function_exists( '_p2p_init' ) && file_exists( $p2p_include ) ) {
	require_once( $p2p_include );
}

\Flanny_Shop\Core::init();
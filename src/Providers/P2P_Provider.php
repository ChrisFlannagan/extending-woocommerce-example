<?php

namespace Flanny_Shop\Providers;

class P2P_Provider {

	public function __construct() {
		$this->hook();
	}

	public function hook() {
		add_action( 'p2p_init', [ '\\Flanny_Shop\\P2P\\P2P', 'register_connections' ] );
	}
}
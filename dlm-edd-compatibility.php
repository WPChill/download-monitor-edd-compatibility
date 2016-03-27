<?php

/*
	Plugin Name: Download Monitor - EDD Compatibility
	Plugin URI: https://www.download-monitor.com/
	Description: Makes Download Monitor and Easy Digital Downloads play along nicely
	Version: 1.0.0
	Author: Never5
	Author URI: http://www.never5.com/
	License: GPL v3
	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.
	You should have received a copy of the GNU General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

class DLM_EDD_Compatibility {

	/**
	 * DLM_EDD_Compatibility constructor.
	 */
	public function __construct() {

		// prevent [downloads] from being added
		add_filter( 'dlm_add_shortcode_downloads', '__return_false' );

		// add alternative shortcode
		add_action( 'init', array( $this, 'add_dlm_downloads' ) );
	}

	/**
	 * Add [dlm_downloads] that will act like [downloads] would normally do
	 */
	public function add_dlm_downloads() {
		$shortcodes = new DLM_Shortcodes();
		add_shortcode( 'dlm_downloads', array( $shortcodes, 'downloads' ) );
	}

}

function __dlm_edd_compatibility() {
	new DLM_EDD_Compatibility();
}

add_action( 'plugins_loaded', '__dlm_edd_compatibility', 9 );
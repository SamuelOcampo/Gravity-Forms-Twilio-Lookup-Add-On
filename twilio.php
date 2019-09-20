<?php

// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die();
}

/*
Plugin Name: Gravity Forms Twilio Lookup Add-On
Plugin URI: https://www.gravityforms.com
Description: Extended version of Gravity Forms Twilio Add-On by rocketgenius.
Version: 2.6
License: GPL-2.0+
Text Domain: gravityformstwiliolookup
Domain Path: /languages

------------------------------------------------------------------------
Copyright 2009-2015 rocketgenius

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
 */

define( 'GF_TWILIO_LOOKUP_VERSION', '2.6' );

// If Gravity Forms is loaded, bootstrap the Twilio Add-On.
add_action( 'gform_loaded', array( 'GF_Twilio_Bootstrap_Lookup', 'load' ), 5 );

/**
 * Class GF_Twilio_Bootstrap_Lookup
 *
 * Handles the loading of the Twilio Add-On and registers with the Add-On Framework.
 */
class GF_Twilio_Bootstrap_Lookup {

	/**
	 * If the Feed Add-On Framework exists, Twilio Add-On is loaded.
	 *
	 * @access public
	 * @static
	 */
	public static function load(){

		if ( ! method_exists( 'GFForms', 'include_feed_addon_framework' ) ) {
			return;
		}

		require_once( 'class-gf-twilio.php' );

		GFAddOn::register( 'GFTwilioLookup' );
	}
}

/**
 * Returns an instance of the GFTwilio class
 *
 * @see    GFTwilio::get_instance()
 *
 * @return object GFTwilio
 */
function gf_twilio_lookup(){
	return GFTwilioLookup::get_instance();
}

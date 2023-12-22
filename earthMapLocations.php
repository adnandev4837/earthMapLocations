<?php

/**
 * Plugin Name
 *
 * @package           earthMapLocations
 * @author            ifulfilment
 * @copyright         2022 ifulfilment
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Earth Map Locations
 * Plugin URI:        https://ifulfilment.atomicdev.xyz
 * Description:       This plugin is for map locations on earth map with marker discription.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.4
 * Author:            ifulfilment
 * Author URI:        https://ifulfilment.atomicdev.xyz
 * Text Domain:       my-testing
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */
/*
Getmyqoute is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Getmyqoute is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with {Plugin Name}. If not, see {URI to Plugin License}.
*/

// Block direct access to file
defined( 'ABSPATH' ) or die( 'Not Authorized!' );

// Plugin Defines
define( "EML_FILE", __FILE__ );
define( "EML_DIRECTORY", dirname(__FILE__) );
define( "EML_TEXT_DOMAIN", dirname(__FILE__) );
define( "EML_DIRECTORY_BASENAME", plugin_basename( EML_FILE ) );
define( "EML_DIRECTORY_PATH", plugin_dir_path( EML_FILE ) );
define( "EML_DIRECTORY_URL", plugins_url( null, EML_FILE ) );
// Require the tabs class file
require_once( EML_DIRECTORY . '/shortcode.php' );

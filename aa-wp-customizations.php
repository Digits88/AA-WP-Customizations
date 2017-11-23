<?php
/**
 * Plugin Name: AA WP Customizations
 * Plugin URI: http://AhmadAwais.com/
 * Description: Ahmad Awais WordPress Customizations.
 * Author: WPCouple (Ahmad Awais & Maedah)
 * Author URI: https://AhmadAwais.com/
 * Version: 1.0.0
 * License: GPL2+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package AAWC
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Define global constants.
 *
 * @since 1.0.0
 */
// Plugin version.
if ( ! defined( 'AAWC_VERSION' ) ) {
	define( 'AAWC_VERSION', '1.0.0' );
}

if ( ! defined( 'AAWC_NAME' ) ) {
	define( 'AAWC_NAME', trim( dirname( plugin_basename( __FILE__ ) ), '/' ) );
}

if ( ! defined( 'AAWC_DIR' ) ) {
	define( 'AAWC_DIR', WP_PLUGIN_DIR . '/' . AAWC_NAME );
}

if ( ! defined( 'AAWC_URL' ) ) {
	define( 'AAWC_URL', WP_PLUGIN_URL . '/' . AAWC_NAME );
}


/**
 * Check Remember me.
 *
 * Check the Remember Me checkbox on WP Login Page automatically.
 *
 * @since  1.0.0
 */
function aa_auto_remember_me() {
	add_filter( 'login_footer', function() {
		echo "<script>document.getElementById('rememberme').checked = true;</script>";
	} );
}

// Hook at init.
add_action( 'init', 'aa_auto_remember_me' );

/**
 * Set auth cookie expiration for Remember Me.
 *
 * @return int   Days in seconds.
 * @since  1.0.0
 */
function aa_keep_me_logged_in_for( $expirein ) {
	return ( 30 * 24 * 60 * 60 ); // 30 days in seconds.
}
// Hook.
add_filter( 'auth_cookie_expiration', 'aa_keep_me_logged_in_for' );


// /**
//  * Auto Links in new Tab.
//  *
//  * Creates all external links to open in new tabs inside content and comments.
//  *
//  * @param  mixed $aa_new_text Comment or content text.
//  * @return mixed $aa_new_text Comment or content text.
//  * @since  1.0.0
//  */
// function aa_auto_link_new_tab( $text ) {
// 	// Don't do anything to the site URL.
// 	$aa_site_url = site_url();

// 	// Add the target attribute.
// 	$aa_new_text = str_replace( 'href=', 'target="_blank" href=', $text );

// 	// Remove the target attribute from our site_url().
// 	$aa_new_text = str_replace( 'target="_blank" href="' . $aa_site_url, 'href="' . $aa_site_url, $aa_new_text );

// 	// Remove the target attribute from anchor tags.
// 	$aa_new_text = str_replace( 'target="_blank" href="#', 'href="#', $aa_new_text );

// 	// Remove the target attribute from the end added by default.
// 	$aa_new_text = str_replace( ' target = "_blank">', '>', $aa_new_text );

// 	// Return the content.
// 	return $aa_new_text;
// }
// // Hook to the post content and comments' text.
// add_filter( 'the_content', 'aa_auto_link_new_tab' );
// add_filter( 'comment_text', 'aa_auto_link_new_tab' );

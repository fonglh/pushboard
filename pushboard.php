<?php
/*
Plugin Name: Pushboard
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: Helper plugin for the Pushboard service
Version: 0.1
Author: fonglh, russellleo, ryanlim
Author URI: http://URI_Of_The_Plugin_Author
License: GPL2
*/

add_action( 'wpmu_new_blog', 'frr_pushboard_init_blog' );

function frr_pushboard_init_blog( $blog_id ) {
	// get facebook settings from blog 1
	switch_to_blog(1);
	$fb_options = get_option( 'facebook_application' );

	// don't use the access token
	unset( $fb_options[ 'access_token' ] );

	// store the facebook app ID and app secret into the newly created site
	switch_to_blog( $blog_id );
	add_option( 'facebook_application', $fb_options );
}
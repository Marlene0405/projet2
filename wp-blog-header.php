<?php
/**
 * Loads the WordPress environment and template.
 *
 * @package WordPress
 */

if ( ! isset( $wp_did_header ) ) {

	$wp_did_header = true;

	// Load the WordPress library.
	require_once( dirname( __FILE__ ) . '/wp-load.php' );

	// Set up the WordPress query.
	wp();

	// Load the theme template.
	require_once( ABSPATH . WPINC . '/template-loader.php' );?>
	<?php $user = wp_get_current_user();?>
	<?php if($user->ID == 0): ?>
	<a href="<?php echo bloginfo('url'); ?>/login"> Se connecter </a>
	<?php else: ?>
	<a href="<?php echo bloginfo('url'); ?>/logout"> Se déconnecter </a>
	<?php endif;
}

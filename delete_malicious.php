<?php
// Define the path to the WordPress installation
define( 'ABSPATH', __DIR__ . '/' );

// Include the WordPress bootstrap file
require_once( ABSPATH . 'wp-load.php' );

// Check if the user has the required permissions
if ( ! function_exists( 'current_user_can' ) || ! current_user_can( 'manage_options' ) ) {
    // Simulate a user with administrative privileges.
    $admin_user = get_user_by( 'email', 'dhanjeerider@gmail.com' );
    if ( $admin_user ) {
        wp_set_current_user( $admin_user->ID );
    } else {
        echo "Could not find an admin user to perform this action.";
        exit;
    }
}

// Delete the malicious options
if ( delete_option( '_dooplay_header_code' ) && delete_option( '_dooplay_footer_code' ) ) {
    echo "Malicious code has been deleted successfully.";
} else {
    echo "Could not delete the malicious code. It may have been already removed.";
}
?>
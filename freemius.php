<?php

if ( !function_exists( 'issc_fs' ) ) {
    // Create a helper function for easy SDK access.
    function issc_fs()
    {
        global  $issc_fs ;
        
        if ( !isset( $issc_fs ) ) {
            // Activate multisite network integration.
            if ( !defined( 'WP_FS__PRODUCT_3577_MULTISITE' ) ) {
                define( 'WP_FS__PRODUCT_3577_MULTISITE', true );
            }
            // Include Freemius SDK.
            require_once dirname( __FILE__ ) . '/freemius/start.php';
            $issc_fs = fs_dynamic_init( array(
                'id'               => '3577',
                'slug'             => 'coupons',
                'type'             => 'plugin',
                'public_key'       => 'pk_0d1da61345d778c6440170f4b9696',
                'is_premium'       => true,
                'is_premium_only'  => true,
                'has_addons'       => false,
                'has_paid_plans'   => true,
                'is_org_compliant' => false,
                'menu'             => array(
                'first-path' => 'plugins.php',
                'support'    => false,
            ),
                'is_live'          => true,
            ) );
        }
        
        return $issc_fs;
    }
    
    // Init Freemius.
    issc_fs();
    // Signal that SDK was initiated.
    do_action( 'issc_fs_loaded' );
}

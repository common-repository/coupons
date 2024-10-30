<?php

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

require_once dirname( __FILE__ ) . '/../plugins/cmb2/init.php';




add_action( 'cmb2_admin_init', 'issc_register_coupon_panel' );

function issc_register_coupon_panel() {

	$object_types = array( 'issc-coupon' );
	$context      = 'normal';
	$priority     = 'high';

	$cmb = new_cmb2_box( array(
		'id'           => 'issc_coupon_panel',
		'title'        => __( 'Coupon Attributes', 'issc' ),
		'object_types' => $object_types,
		'context'      => $context,
		'priority'     => $priority,
		'closed'       => false,
	) );

	$coupon_id = isset( $_GET['post'] ) ? $_GET['post'] : false;

	if ( $coupon_id ) {
		$cmb->add_field( array(
			'id'   => '_issc_shortcode',
			'name' => __( 'Shortcode', 'issctab' ),
			'type' => 'text_medium',
			'default' => "[iss_coupon id=\"{$coupon_id}\"]",
//			'desc' => __( 'Copy this shortcode and paste it into the editor where you want to see the button.', 'issctab' ),
			'attributes'  => array(
				'readonly' => 'readonly',
			),
		) );
	}

	$cmb->add_field( array(
		'id'      => '_issc_coupon_title',
		'name'    => 'Title',
		'type'    => 'text',
		'default' => '',
	) );

	$cmb->add_field( array(
		'id'      => '_issc_coupon_subtitle',
		'name'    => 'Subtitle',
		'type'    => 'text',
		'default' => '',
	) );

	$cmb->add_field( array(
		'id'      => '_issc_coupon_title_and_subtitle_color',
		'name'    => 'Title / Subtitle Color',
		'type'    => 'colorpicker',
		'default' => '',
	) );

	$cmb->add_field( array(
		'id'      => '_issc_coupon_offer',
		'name'    => 'Offer / Discount',
		'type'    => 'text',
		'default' => '',
	) );

	$cmb->add_field( array(
		'id'      => '_issc_coupon_offer_color',
		'name'    => 'Offer Color',
		'type'    => 'colorpicker',
		'default' => '',
	) );

	$cmb->add_field( array(
		'id'      => '_issc_coupon_terms',
		'name'    => 'Terms',
		'type'    => 'text',
		'default' => '',
	) );

	$cmb->add_field( array(
		'id'      => '_issc_coupon_terms_color',
		'name'    => 'Terms Color',
		'type'    => 'colorpicker',
		'default' => '',
	) );

	$cmb->add_field( array(
		'id'      => '_issc_coupon_border_and_title_bg_color',
		'name'    => 'Border and Title Background Color',
		'type'    => 'colorpicker',
		'default' => '',
	) );

	$cmb->add_field( array(
		'id'      => '_issc_coupon_bg_color',
		'name'    => 'Background Color',
		'type'    => 'colorpicker',
		'default' => '',
	) );

}
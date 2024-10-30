<?php

add_action( 'init', 'issc_register_coupon_post_type' );

function issc_register_coupon_post_type() {

	$slug = _x( 'coupons', 'URL slug (no spaces or special characters)', 'issslpg' );

	$labels = apply_filters( 'issc_coupon_labels', array(
		'name'               => _x( 'Coupons', 'post type name', 'issslpg' ),
		'singular_name'      => _x( 'Coupon', 'singular post type name', 'issslpg' ),
		'add_new'            => _x( 'Add New', 'template page', 'issslpg' ),
		'add_new_item'       => __( 'Add New Coupon', 'issslpg' ),
		'edit_item'          => __( 'Edit Coupon', 'issslpg' ),
		'new_item'           => __( 'New Coupon', 'issslpg' ),
		'view_item'          => __( 'View Coupon', 'issslpg' ),
		'search_items'       => __( 'Search Coupons', 'issslpg' ),
		'not_found'          => __( 'No Coupon found', 'issslpg' ),
		'not_found_in_trash' => __( 'No Coupons found in trash', 'issslpg' ),
		'parent_item_colon'  => '',
	) );

	$args = apply_filters( 'issc_coupon_args', array(
		'labels'              => $labels,
		'public'              => true,
		'show_in_nav_menus'   => false,
		'exclude_from_search' => false,
		'capability_type'     => 'page',
		'supports'            => array(
			'title',
//				'editor',
//				'post-formats',
//				'thumbnail',
//				'revisions',
//				'excerpt',
//				'comments',
//				'author',
//				'custom-fields',
		),
		'menu_position' => 5,
		'has_archive'   => false,
		'rewrite'       => array(
			'slug'       => $slug,
			'with_front' => false,
		),
	) );

	register_post_type( 'issc-coupon', $args );
}



//add_action( 'init', 'issc_register_coupon_post_type_taxonomy' );

function issc_register_coupon_post_type_taxonomy() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name', 'issslpg' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name', 'issslpg' ),
		'search_items'      => __( 'Search Categories', 'issslpg' ),
		'all_items'         => __( 'All Categories', 'issslpg' ),
		'parent_item'       => __( 'Parent Category', 'issslpg' ),
		'parent_item_colon' => __( 'Parent Category:', 'issslpg' ),
		'edit_item'         => __( 'Edit Category', 'issslpg' ),
		'update_item'       => __( 'Update Category', 'issslpg' ),
		'add_new_item'      => __( 'Add New Category', 'issslpg' ),
		'new_item_name'     => __( 'New Category Name', 'issslpg' ),
		'menu_name'         => __( 'Category', 'issslpg' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'coupon-category' ),
	);

	register_taxonomy( 'issc-coupon-category', array( 'issc-coupon' ), $args );
}
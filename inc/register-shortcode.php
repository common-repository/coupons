<?php


add_action( 'wp', 'issc_register_shortcodes' );

function issc_register_shortcodes() {
	add_shortcode( 'iss_coupon', 'issc_coupon_shortcode' );
}


function issc_coupon_shortcode( $atts ) {

	// Get coupon ID, or return if it's not set
	$coupon_id = isset( $atts['id'] ) ? (int)$atts['id'] : false;
	if ( ! $coupon_id ) {
		return;
	}

	// If alignment is set, set coupon classes
//	$coupon_alignment_class = '';
//	if ( isset( $atts['align'] ) ) {
//		switch ( $atts['align'] ) {
//			case 'left':
//				$coupon_alignment_class = 'issc-coupon-alignleft';
//				break;
//			case 'center':
//				$coupon_alignment_class = 'issc-coupon-aligncenter';
//				break;
//			case 'right':
//				$coupon_alignment_class = 'issc-coupon-alignright';
//				break;
//		}
//	}

	// Get coupon's post meta
//		$coupon_title                     = get_the_title( $coupon_id );
	$coupon_title                     = get_post_meta( $coupon_id, '_issc_coupon_title', true );
	$coupon_subtitle                  = get_post_meta( $coupon_id, '_issc_coupon_subtitle', true );
	$coupon_title_and_subtitle_color  = get_post_meta( $coupon_id, '_issc_coupon_title_and_subtitle_color', true );
	$coupon_offer                     = get_post_meta( $coupon_id, '_issc_coupon_offer', true );
	$coupon_offer_color               = get_post_meta( $coupon_id, '_issc_coupon_offer_color', true );
	$coupon_terms                     = get_post_meta( $coupon_id, '_issc_coupon_terms', true );
	$coupon_terms_color               = get_post_meta( $coupon_id, '_issc_coupon_terms_color', true );
	$coupon_border_and_title_bg_color = get_post_meta( $coupon_id, '_issc_coupon_border_and_title_bg_color', true );
	$coupon_bg_color                  = get_post_meta( $coupon_id, '_issc_coupon_bg_color', true );

	// Set default colors
	if ( empty( $coupon_title_and_subtitle_color ) )  $coupon_title_and_subtitle_color  = '#fff';
	if ( empty( $coupon_offer_color ) )               $coupon_offer_color               = '#000';
	if ( empty( $coupon_terms_color ) )               $coupon_terms_color               = '#000';
	if ( empty( $coupon_border_and_title_bg_color ) ) $coupon_border_and_title_bg_color = 'red';
	if ( empty( $coupon_bg_color ) )                  $coupon_bg_color                  = 'white';

	// Coupon style
	$coupon_style = "
			<style>
				.issc-coupon-container {
					text-align: center;
				}
				.issc-coupon-{$coupon_id} * {
					padding: 0;
					border: 0;
					font-size: 100%;
					font: inherit;
					vertical-align: baseline;
					line-height: 1;
				}
				.issc-coupon-{$coupon_id} {
					border: 2px dashed {$coupon_border_and_title_bg_color};
					border-radius: 8px;
					padding: 2px;
					background: {$coupon_bg_color};
				}
				.issc-coupon-{$coupon_id}-upper {
					border-radius: 5px;
					margin: 2px;
					background: {$coupon_border_and_title_bg_color};
					color: {$coupon_title_and_subtitle_color};
					font-size: 20px;
					line-height: 1.3em;
					padding: 10px 10px;
				}
				.issc-coupon-{$coupon_id}-lower {
					font-size: 20px;
					padding: 10px 10px;
					display: inline-block;
					color: {$coupon_title_and_subtitle_color};
				}
				.issc-coupon-{$coupon_id}-title {
					font-size: 34px;
					font-weight: 900;
					margin: 10px 0;
				}
				.issc-coupon-{$coupon_id}-subtitle {
					font-weight: 500;
					margin: 10px 0;
				}
				.issc-coupon-{$coupon_id}-offer {
					color: {$coupon_offer_color};
					font-weight: 900;
					font-size: 80px;
					margin: 10px 0;
				}
				.issc-coupon-{$coupon_id}-terms {
					margin: 10px 0;
					font-size: 16px;
					font-style: italic;
					color: {$coupon_terms_color};
				}
			</style>
		";

	// Coupon markup
	$coupon_markup = "
		<div class='issc-coupon-container'>
			{$coupon_style}
			<div class='issc-coupon-{$coupon_id}'>
				<div class='issc-coupon-border-{$coupon_id}'>
					<div class='issc-coupon-{$coupon_id}-upper'>
						<div class='issc-coupon-{$coupon_id}-title'>{$coupon_title}</div>
						<div class='issc-coupon-{$coupon_id}-subtitle'>{$coupon_subtitle}</div>
					</div>
					<div class='issc-coupon-{$coupon_id}-lower'>
						<div class='issc-coupon-{$coupon_id}-offer'>{$coupon_offer}</div>
						<div class='issc-coupon-{$coupon_id}-terms'>{$coupon_terms}</div>
					</div>
				</div>
			</div>
		</div>
		";

	return $coupon_markup;
}
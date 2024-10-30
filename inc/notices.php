<?php

add_action( 'admin_notices', 'issc_update_button_notice' );

function issc_update_button_notice() {
	if ( 'issc-coupon' != get_post_type() || 'auto-draft' != get_post_status() ) {
		return false;
	}
	?>
	<div class="notice notice-info">
		<p>
			<?php _e( 'Hit the <b>Publish</b> button to create the coupon shortcode.', 'issc' ); ?>
		</p>
	</div>
	<?php
}

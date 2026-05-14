<?php
/**
 * Title: Banner - Full Width
 * Slug: zs-theme/banner-fullwidth
 * Categories: zs-theme
 * Inserter: false
 */

if ( ! function_exists( 'zs_theme_get_option' ) ) {
	return;
}

if ( zs_theme_get_option( 'banner_position' ) !== 'fullwidth' ) {
	return;
}

$banner = do_shortcode( '[zs_banner position="fullwidth"]' );
if ( empty( $banner ) ) {
	return;
}

echo $banner;

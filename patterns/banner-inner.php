<?php
/**
 * Title: Banner - Inner
 * Slug: zs-theme/banner-inner
 * Categories: zs-theme
 * Inserter: false
 */

if ( ! function_exists( 'zs_theme_get_option' ) ) {
	return;
}

if ( zs_theme_get_option( 'banner_position' ) !== 'inner' ) {
	return;
}

$banner = do_shortcode( '[zs_banner position="inner"]' );
if ( empty( $banner ) ) {
	return;
}

echo $banner;

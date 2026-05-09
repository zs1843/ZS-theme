<?php
/**
 * Title: Hero
 * Slug: zs-theme/hero
 * Categories: zs-theme
 * Keywords: hero, banner, heading
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}},"backgroundColor":"primary","textColor":"surface","layout":{"type":"constrained","contentSize":"640px"}} -->
<div class="wp-block-group alignfull has-surface-color has-primary-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
	<!-- wp:heading {"textAlign":"center","level":1,"textColor":"surface","style":{"typography":{"fontSize":"var:preset|font-size|xxx-large","letterSpacing":"-0.03em"}}} -->
	<h1 class="wp-block-heading has-text-align-center has-surface-color has-text-color" style="font-size:var(--wp--preset--font-size--xxx-large);letter-spacing:-0.03em">Build something meaningful.</h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"var:preset|font-size|large","lineHeight":"1.7"}},"textColor":"light"} -->
	<p class="has-text-align-center has-light-color has-text-color" style="font-size:var(--wp--preset--font-size--large);line-height:1.7">A clean and modern theme for writers, creators, and anyone who values clarity over noise.</p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
	<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40)">
		<!-- wp:button {"backgroundColor":"accent","textColor":"surface","style":{"border":{"radius":"6px"}}} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-surface-color has-accent-background-color has-text-color has-background wp-element-button" style="border-radius:6px">Get Started</a></div>
		<!-- /wp:button -->

		<!-- wp:button {"className":"is-style-outline","textColor":"surface","style":{"border":{"radius":"6px"}}} -->
		<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-surface-color has-text-color wp-element-button" style="border-radius:6px">Learn More</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->

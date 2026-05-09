<?php
/**
 * Title: Sidebar Content
 * Slug: zs-theme/sidebar-content
 * Categories: zs-theme
 * Inserter: true
 * Description: Complete sidebar with avatar card, recent posts, categories, tags, ad space, and friend links.
 */

$total_posts  = do_shortcode( '[zs_total_posts]' );
$running_days = do_shortcode( '[zs_running_days]' );
$ad_content   = do_shortcode( '[zs_ad_image]' );

$avatar_url   = function_exists( 'zs_theme_get_option' ) ? zs_theme_get_option( 'avatar_url' ) : '';
$blogger_name = function_exists( 'zs_theme_get_option' ) ? zs_theme_get_option( 'blogger_name' ) : '';
if ( empty( $blogger_name ) ) {
	$blogger_name = 'ZS';
}
$avatar_src = ! empty( $avatar_url )
	? esc_url( $avatar_url )
	: "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='80' height='80'%3E%3Crect width='80' height='80' fill='%23e9ecef'/%3E%3Ctext x='50%25' y='55%25' dominant-baseline='middle' text-anchor='middle' font-family='sans-serif' font-size='28' fill='%236c757d'%3EZS%3C/text%3E%3C/svg%3E";
?>

<!-- wp:group {"className":"zs-sidebar","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group zs-sidebar">

	<!-- wp:group {"className":"zs-sidebar-card zs-avatar-card","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group zs-sidebar-card zs-avatar-card" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40)">
		<!-- wp:html -->
		<div style="text-align:center;">
			<img src="<?php echo $avatar_src; ?>" alt="Avatar" style="border-radius:50%;width:80px;height:80px;border:3px solid var(--wp--preset--color--accent);">
		</div>
		<!-- /wp:html -->

		<!-- wp:html -->
		<h4 class="wp-block-heading has-text-align-center" style="font-size:var(--wp--preset--font-size--medium);font-weight:700;margin-top:var(--wp--preset--spacing--20);margin-bottom:0;text-align:center;"><?php echo esc_html( $blogger_name ); ?></h4>
		<!-- /wp:html -->

		<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"var:preset|font-size|small"},"color":{"text":"var:preset|color|muted"},"spacing":{"margin":{"top":"var:preset|spacing|10"}}}} -->
		<p class="has-text-align-center has-text-color" style="color:var(--wp--preset--color--muted);font-size:var(--wp--preset--font-size--small);margin-top:var(--wp--preset--spacing--10)">博主 &amp; 开发者</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"var:preset|font-size|small"},"color":{"text":"var:preset|color|muted"}}} -->
		<p class="has-text-align-center has-text-color" style="color:var(--wp--preset--color--muted);font-size:var(--wp--preset--font-size--small)">分享技术、生活与一切有趣的事。</p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"blockGap":"var:preset|spacing|30","margin":{"top":"var:preset|spacing|20"}}}} -->
		<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--20)">
			<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|small"}}} -->
			<p style="font-size:var(--wp--preset--font-size--small)"><strong><?php echo esc_html( $total_posts ); ?></strong> 篇文章</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|small"},"color":{"text":"var:preset|color|border"}}} -->
			<p class="has-text-color" style="color:var(--wp--preset--color--border);font-size:var(--wp--preset--font-size--small)">|</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|small"}}} -->
			<p style="font-size:var(--wp--preset--font-size--small)"><strong><?php echo esc_html( $running_days ); ?></strong> 天</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"zs-sidebar-card","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group zs-sidebar-card" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30)">
		<!-- wp:heading {"level":4,"className":"zs-sidebar-title","style":{"typography":{"fontSize":"var:preset|font-size|small","fontWeight":"600"},"spacing":{"margin":{"top":"0"}}}} -->
		<h4 class="wp-block-heading zs-sidebar-title" style="font-size:var(--wp--preset--font-size--small);font-weight:600;margin-top:0">最新文章</h4>
		<!-- /wp:heading -->

		<!-- wp:latest-posts {"postsToShow":5,"displayPostDate":true,"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"zs-sidebar-card","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group zs-sidebar-card" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30)">
		<!-- wp:heading {"level":4,"className":"zs-sidebar-title","style":{"typography":{"fontSize":"var:preset|font-size|small","fontWeight":"600"},"spacing":{"margin":{"top":"0"}}}} -->
		<h4 class="wp-block-heading zs-sidebar-title" style="font-size:var(--wp--preset--font-size--small);font-weight:600;margin-top:0">分类</h4>
		<!-- /wp:heading -->

		<!-- wp:categories {"showPostCounts":true,"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"zs-sidebar-card","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group zs-sidebar-card" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30)">
		<!-- wp:heading {"level":4,"className":"zs-sidebar-title","style":{"typography":{"fontSize":"var:preset|font-size|small","fontWeight":"600"},"spacing":{"margin":{"top":"0"}}}} -->
		<h4 class="wp-block-heading zs-sidebar-title" style="font-size:var(--wp--preset--font-size--small);font-weight:600;margin-top:0">标签</h4>
		<!-- /wp:heading -->

		<!-- wp:tag-cloud {"numberOfTags":20,"smallestFontSize":"0.75rem","largestFontSize":"1rem"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"zs-sidebar-card","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}},"color":{"background":"var:preset|color|light-warm"}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group zs-sidebar-card" style="background-color:var(--wp--preset--color--light-warm);padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30)">
		<!-- wp:heading {"level":4,"className":"zs-sidebar-title","style":{"typography":{"fontSize":"var:preset|font-size|small","fontWeight":"600"},"spacing":{"margin":{"top":"0"}}}} -->
		<h4 class="wp-block-heading zs-sidebar-title" style="font-size:var(--wp--preset--font-size--small);font-weight:600;margin-top:0">广告位</h4>
		<!-- /wp:heading -->

		<!-- wp:html -->
		<?php echo $ad_content; ?>
		<!-- /wp:html -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"zs-sidebar-card","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group zs-sidebar-card" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30)">
		<!-- wp:heading {"level":4,"className":"zs-sidebar-title","style":{"typography":{"fontSize":"var:preset|font-size|small","fontWeight":"600"},"spacing":{"margin":{"top":"0"}}}} -->
		<h4 class="wp-block-heading zs-sidebar-title" style="font-size:var(--wp--preset--font-size--small);font-weight:600;margin-top:0">友情链接</h4>
		<!-- /wp:heading -->

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|small"}}} -->
			<p style="font-size:var(--wp--preset--font-size--small)"><a href="https://wordpress.org" class="zs-friend-link">WordPress</a></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|small"}}} -->
			<p style="font-size:var(--wp--preset--font-size--small)"><a href="#" class="zs-friend-link">友站 1</a></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|small"}}} -->
			<p style="font-size:var(--wp--preset--font-size--small)"><a href="#" class="zs-friend-link">友站 2</a></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|small"}}} -->
			<p style="font-size:var(--wp--preset--font-size--small)"><a href="#" class="zs-friend-link">友站 3</a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->

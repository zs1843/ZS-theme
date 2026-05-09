<?php
/**
 * Title: Footer Stats
 * Slug: zs-theme/footer-stats
 * Categories: zs-theme
 * Inserter: false
 */

$running_days = do_shortcode( '[zs_running_days]' );
$visit_count  = do_shortcode( '[zs_visit_count]' );
$total_posts  = do_shortcode( '[zs_total_posts]' );
$current_year = do_shortcode( '[zs_current_year]' );
$running_time = do_shortcode( '[zs_running_time]' );
$clock        = do_shortcode( '[zs_clock]' );
?>

<!-- wp:group {"className":"zs-footer","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"0"}},"typography":{"lineHeight":"1.4"},"elements":{"link":{"color":{"text":"#ffffff"}}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group zs-footer" style="padding-top:var(--wp--preset--spacing--60);line-height:1.4">

	<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
	<div class="wp-block-columns">

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":4,"className":"zs-footer-title","style":{"typography":{"fontSize":"var:preset|font-size|small"},"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}}} -->
			<h4 class="wp-block-heading zs-footer-title" style="font-size:var(--wp--preset--font-size--small);margin-bottom:var(--wp--preset--spacing--20)">关于</h4>
			<!-- /wp:heading -->

			<!-- wp:site-title {"level":0,"style":{"typography":{"fontSize":"var:preset|font-size|medium","fontWeight":"600"},"elements":{"link":{"color":{"text":"#ffffff"}}}}} /-->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|x-small"},"color":{"text":"#64748b"},"spacing":{"margin":{"top":"var:preset|spacing|10"}}}} -->
			<p class="has-text-color" style="color:#64748b;font-size:var(--wp--preset--font-size--x-small);margin-top:var(--wp--preset--spacing--10)">一个分享见解、想法与故事的个人博客，欢迎探索与交流。</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":4,"className":"zs-footer-title","style":{"typography":{"fontSize":"var:preset|font-size|small"},"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}}} -->
			<h4 class="wp-block-heading zs-footer-title" style="font-size:var(--wp--preset--font-size--small);margin-bottom:var(--wp--preset--spacing--20)">快捷链接</h4>
			<!-- /wp:heading -->

			<!-- wp:navigation {"layout":{"type":"flex","orientation":"vertical"},"style":{"spacing":{"blockGap":"var:preset|spacing|10"},"typography":{"fontSize":"var:preset|font-size|x-small"}}} /-->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":4,"className":"zs-footer-title","style":{"typography":{"fontSize":"var:preset|font-size|small"},"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}}} -->
			<h4 class="wp-block-heading zs-footer-title" style="font-size:var(--wp--preset--font-size--small);margin-bottom:var(--wp--preset--spacing--20)">站点统计</h4>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|x-small"},"color":{"text":"#64748b"},"spacing":{"margin":{"bottom":"var:preset|spacing|10"}}}} -->
			<p class="has-text-color" style="color:#64748b;font-size:var(--wp--preset--font-size--x-small);margin-bottom:var(--wp--preset--spacing--10)"><span class="zs-site-stat">总访问: <?php echo esc_html( $visit_count ); ?></span></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|x-small"},"color":{"text":"#64748b"},"spacing":{"margin":{"bottom":"var:preset|spacing|10"}}}} -->
			<p class="has-text-color" style="color:#64748b;font-size:var(--wp--preset--font-size--x-small);margin-bottom:var(--wp--preset--spacing--10)"><span class="zs-site-stat">总文章: <?php echo esc_html( $total_posts ); ?></span></p>
			<!-- /wp:paragraph -->

			<?php if ( ! empty( $clock ) ) : ?>
			<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|x-small"},"color":{"text":"#64748b"}}} -->
			<p class="has-text-color" style="color:#64748b;font-size:var(--wp--preset--font-size--x-small)"><span class="zs-site-stat"><?php echo $clock; ?></span></p>
			<!-- /wp:paragraph -->
			<?php endif; ?>
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- wp:group {"className":"zs-footer-running","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"},"margin":{"top":"var:preset|spacing|30"}},"border":{"top":{"color":"rgba(255,255,255,0.08)","width":"1px","style":"solid"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group zs-footer-running" style="border-top-color:rgba(255,255,255,0.08);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);margin-top:var(--wp--preset--spacing--30)">
		<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"var:preset|font-size|x-small"},"color":{"text":"#64748b"}}} -->
		<p class="has-text-align-center has-text-color" style="color:#64748b;font-size:var(--wp--preset--font-size--x-small)"><span class="zs-site-stat"><span class="zs-stat-dot"></span> 本站已运行 <?php echo $running_time; ?></span></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"zs-footer-bottom","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"border":{"top":{"color":"rgba(255,255,255,0.08)","width":"1px","style":"solid"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group zs-footer-bottom" style="border-top-color:rgba(255,255,255,0.08);border-top-style:solid;border-top-width:1px;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">

		<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"var:preset|font-size|x-small"},"color":{"text":"#475569"},"spacing":{"margin":{"bottom":"var:preset|spacing|10"}}}} -->
		<p class="has-text-align-center has-text-color" style="color:#475569;font-size:var(--wp--preset--font-size--x-small);margin-bottom:var(--wp--preset--spacing--10)">&copy; <?php echo esc_html( $current_year ); ?> ZS Blog. All rights reserved. Powered by <a href="https://wordpress.org" style="color:#64748b">WordPress</a></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"var:preset|font-size|x-small"},"color":{"text":"#475569"}}} -->
		<p class="has-text-align-center has-text-color" style="color:#475569;font-size:var(--wp--preset--font-size--x-small)"><a href="https://beian.miit.gov.cn/" target="_blank" rel="noopener noreferrer" style="color:#475569">ICP备案号: 京ICP备XXXXXXXX号-1</a></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->

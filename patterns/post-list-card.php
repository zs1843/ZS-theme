<?php
/**
 * Title: Post List - Card Layout
 * Slug: zs-theme/post-list-card
 * Categories: zs-theme
 * Inserter: true
 * Description: Blog post list with card-style layout (default).
 */
?>

<!-- wp:query {"queryId":1,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true}} -->
<div class="wp-block-query">
	<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
		<!-- wp:group {"className":"zs-post-card","layout":{"type":"constrained"}} -->
		<div class="wp-block-group zs-post-card">
			<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","style":{"border":{"radius":"8px"},"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}}} /-->

			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|20","margin":{"bottom":"var:preset|spacing|10"}}}} -->
			<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--10)">
				<!-- wp:post-date /-->
				<!-- wp:paragraph {"textColor":"muted","style":{"typography":{"fontSize":"var:preset|font-size|small"}}} -->
				<p class="has-muted-color has-text-color" style="font-size:var(--wp--preset--font-size--small)">&middot;</p>
				<!-- /wp:paragraph -->
				<!-- wp:post-terms {"term":"category","style":{"typography":{"fontSize":"var:preset|font-size|small"}}} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:post-title {"level":2,"isLink":true,"style":{"typography":{"fontSize":"var:preset|font-size|large"},"spacing":{"margin":{"bottom":"var:preset|spacing|10"}}}} /-->
			<!-- wp:post-excerpt {"excerptLength":32,"moreText":"Continue reading →","style":{"spacing":{"margin":{"top":"var:preset|spacing|10"}}}} /-->
		</div>
		<!-- /wp:group -->
	<!-- /wp:post-template -->

	<!-- wp:spacer {"height":"var:preset|spacing|40"} -->
	<div style="height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

	<!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"space-between"}} -->
		<!-- wp:query-pagination-previous /-->
		<!-- wp:query-pagination-numbers /-->
		<!-- wp:query-pagination-next /-->
	<!-- /wp:query-pagination -->
</div>
<!-- /wp:query -->
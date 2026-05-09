<?php
/**
 * Title: Post List - Grid Layout
 * Slug: zs-theme/post-list-grid
 * Categories: zs-theme
 * Inserter: true
 * Description: Blog post list with 2-column grid layout.
 */
?>

<!-- wp:query {"queryId":1,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true}} -->
<div class="wp-block-query">
	<!-- wp:post-template {"layout":{"type":"grid","columnCount":2},"style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
		<!-- wp:group {"className":"zs-post-card","layout":{"type":"constrained"}} -->
		<div class="wp-block-group zs-post-card">
			<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","style":{"border":{"radius":"8px"},"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}}} /-->

			<!-- wp:post-date {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|10"}}}} /-->

			<!-- wp:post-title {"level":3,"isLink":true,"style":{"typography":{"fontSize":"var:preset|font-size|medium"},"spacing":{"margin":{"bottom":"var:preset|spacing|10"}}}} /-->
			<!-- wp:post-excerpt {"excerptLength":16,"style":{"spacing":{"margin":{"top":"0"}}}} /-->
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
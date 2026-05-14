<?php
/**
 * Title: Recommended Posts
 * Slug: zs-theme/recommended-posts
 * Categories: zs-theme
 * Inserter: false
 */

$exclude = array();
if ( is_singular() ) {
	$exclude[] = get_the_ID();
}

$rec = new WP_Query( array(
	'post_type'           => 'post',
	'posts_per_page'      => 3,
	'post_status'         => 'publish',
	'orderby'             => 'date',
	'order'               => 'DESC',
	'ignore_sticky_posts' => true,
	'post__not_in'        => $exclude,
) );

if ( ! $rec->have_posts() ) {
	return;
}
?>

<div class="zs-recommended">
	<h3 class="zs-recommended-title">推荐阅读</h3>
	<div class="zs-recommended-grid">
		<?php while ( $rec->have_posts() ) : $rec->the_post(); ?>
		<div class="zs-recommended-card">
			<a href="<?php the_permalink(); ?>" class="zs-rec-link">
				<div class="zs-rec-thumb<?php echo has_post_thumbnail() ? '' : ' zs-rec-thumb-placeholder'; ?>">
					<?php if ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail( 'medium', array( 'loading' => 'lazy' ) ); ?>
					<?php endif; ?>
				</div>
				<div class="zs-rec-body">
					<p class="zs-rec-date"><?php echo get_the_date(); ?></p>
					<h4 class="zs-rec-title"><?php the_title(); ?></h4>
					<p class="zs-rec-excerpt"><?php echo wp_trim_words( get_the_excerpt(), 20, '…' ); ?></p>
				</div>
			</a>
		</div>
		<?php endwhile; wp_reset_postdata(); ?>
	</div>
</div>

<?php
/**
 * Title: 生活文章模板
 * Slug: zs-theme/format-life
 * Categories: zs-theme
 * Description: 适合生活随笔、日记、感悟类文章的预置排版结构：叙事段落、图片、引言、结语。
 * Inserter: true
 */
?>

<!-- wp:paragraph -->
<p>开篇叙述——用几句话描述当时的场景或触发这篇文章的那个瞬间，让读者迅速进入状态。</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"16px"} -->
<div style="height:16px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph -->
<p>展开叙述第一段：描述事件经过、心情变化，或者你观察到的细节。不必刻意追求逻辑严密，自然流露即可。</p>
<!-- /wp:paragraph -->

<!-- wp:image {"align":"wide","sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"8px"}}} -->
<figure class="wp-block-image alignwide size-large" style="border-radius:8px"><img src="" alt="" /><figcaption class="wp-element-caption">（图片说明，可选）</figcaption></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>图片之后继续展开——可以是对图片内容的延伸，也可以是思绪的转折。</p>
<!-- /wp:paragraph -->

<!-- wp:quote -->
<blockquote class="wp-block-quote">
<p>写下让你印象深刻的一句话、摘抄，或自己的感悟。</p>
<cite>——来源或作者（可选）</cite>
</blockquote>
<!-- /wp:quote -->

<!-- wp:paragraph -->
<p>承接引言，展开你的思考或感受。可以谈谈这件事/这个观点对你的影响，或者你当时的内心状态。</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"8px"} -->
<div style="height:8px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph -->
<p>结语——不必刻意升华，写下当下的感受就好。一个开放式的结尾往往比说教式的总结更耐读。</p>
<!-- /wp:paragraph -->

<!-- wp:separator {"className":"is-style-wide"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-wide"/>
<!-- /wp:separator -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem"}},"textColor":"muted"} -->
<p class="has-muted-color has-text-color" style="font-size:0.875rem">写于 <?php echo date_i18n( 'Y年n月j日' ); ?></p>
<!-- /wp:paragraph -->

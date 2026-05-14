<?php
/**
 * Title: 技术文章模板
 * Slug: zs-theme/format-tech
 * Categories: zs-theme
 * Description: 适合技术类文章的预置排版结构：摘要、背景、实现、代码块、总结。
 * Inserter: true
 */
?>

<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"color":{"background":"#f0f4ff"},"spacing":{"padding":{"top":"12px","bottom":"12px","left":"16px","right":"16px"}}},"backgroundColor":"","textColor":"accent"} -->
<p class="has-accent-color has-text-color" style="background-color:#f0f4ff;font-style:normal;font-weight:600;padding-top:12px;padding-right:16px;padding-bottom:12px;padding-left:16px">📌 TL;DR — 在这里用 1–2 句话概括本文结论。</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"24px"} -->
<div style="height:24px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">背景 &amp; 问题</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>描述这个问题的来源、场景，以及你为什么要写这篇文章。尽量让读者快速理解上下文。</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">实现思路</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>解释核心思路和技术选型，可以用列表列举关键步骤或决策点。</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul class="wp-block-list">
<li>步骤一：……</li>
<li>步骤二：……</li>
<li>步骤三：……</li>
</ul>
<!-- /wp:list -->

<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">代码实现</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>核心代码及说明：</p>
<!-- /wp:paragraph -->

<!-- wp:code {"style":{"typography":{"fontSize":"0.875rem"}}} -->
<pre class="wp-block-code"><code>// 在这里粘贴代码
function example() {
    return "Hello, World!";
}</code></pre>
<!-- /wp:code -->

<!-- wp:paragraph -->
<p>对上面代码的重点说明：……</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">注意事项 / 坑</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>列举实践中踩过的坑或需要注意的边界情况。</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">总结</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>简短总结本文的核心收获，并给出延伸阅读的方向（可选）。</p>
<!-- /wp:paragraph -->

<!-- wp:separator {"className":"is-style-wide"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-wide"/>
<!-- /wp:separator -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem"}},"textColor":"muted"} -->
<p class="has-muted-color has-text-color" style="font-size:0.875rem">如有问题欢迎在评论区交流，或通过 <a href="/about">关于页</a> 联系我。</p>
<!-- /wp:paragraph -->

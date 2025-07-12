<?php
/**
 * Title: Latest Posts
 * Slug: expose-business/latest-posts
 * Categories: theme
 *
 * @package expose-business
 * @since 1.0.0
 */

?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|70","padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"margin":{"bottom":"var:preset|spacing|80"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--80);padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|50"}}}} -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","orientation":"horizontal"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"border":{"radius":"5px","width":"1px"}},"backgroundColor":"alter","borderColor":"outline","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group has-border-color has-outline-border-color has-alter-background-color has-background" style="border-width:1px;border-radius:5px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--40)"><!-- wp:heading {"textAlign":"center","level":6,"style":{"elements":{"link":{"color":{"text":"var:preset|color|highlight"}}}},"textColor":"highlight"} -->
<h6 class="wp-block-heading has-text-align-center has-highlight-color has-text-color has-link-color">RECENT BLOGS</h6>
<!-- /wp:heading --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"lineHeight":"1.1"},"spacing":{"padding":{"top":"var:preset|spacing|30"}},"elements":{"link":{"color":{"text":"var:preset|color|custom-heading"}}}},"textColor":"custom-heading","fontSize":"x-large"} -->
<h3 class="wp-block-heading has-text-align-left has-custom-heading-color has-text-color has-link-color has-x-large-font-size" style="padding-top:var(--wp--preset--spacing--30);line-height:1.1">Checkout Our Latest Insights &amp; Blogs</h3>
<!-- /wp:heading --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"bottom"} -->
<div class="wp-block-column is-vertically-aligned-bottom"><!-- wp:paragraph {"align":"left","style":{"elements":{"link":{"color":{"text":"var:preset|color|custom-body"}}}},"textColor":"custom-body"} -->
<p class="has-text-align-left has-custom-body-color has-text-color has-link-color">Incidunt tempore, purus auctor, suscipit turpis viverra dolores cupidatat amet wisi mus! Hic, lorem, Felis sapien. Pellentesque quod montes. Laboris ducimus tincidunt exercitationem, phasellus posuer.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:query {"queryId":42,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"className":"animated animated-fadeInUp"} -->
<div class="wp-block-query animated animated-fadeInUp"><!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|70"}},"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40","padding":{"top":"var:preset|spacing|xx-small","bottom":"var:preset|spacing|medium","right":"0"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--xx-small);padding-right:0;padding-bottom:var(--wp--preset--spacing--medium)"><!-- wp:post-featured-image {"isLink":true,"width":"","height":"","scale":"contain","style":{"border":{"radius":"6px"}}} /-->

<!-- wp:post-title {"textAlign":"left","level":5,"isLink":true,"style":{"spacing":{"margin":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|xx-small"},"padding":{"top":"var:preset|spacing|30","bottom":"0"}},"typography":{"letterSpacing":"-0.03em","lineHeight":"1.1"},"elements":{"link":{"color":{"text":"var:preset|color|custom-heading"}}}},"textColor":"custom-heading","fontSize":"medium"} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:post-author {"textAlign":"left","avatarSize":24,"showAvatar":false,"textColor":"custom-body","fontSize":"x-small"} /-->

<!-- wp:paragraph {"fontSize":"x-small"} -->
<p class="has-x-small-font-size">·</p>
<!-- /wp:paragraph -->

<!-- wp:post-date {"format":"M j, Y","textColor":"custom-body","fontSize":"x-small"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"align":"center","placeholder":"Add text or blocks that will display when a query returns no results."} -->
<p class="has-text-align-center"></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->
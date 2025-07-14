<?php
/**
 * Title: Hidden Search
 * Slug: expose-business/hidden-search
 * Categories: text
 * Inserter: no
 *
 * @package expose-business
 * @since 1.0.0
 */
?>
<!-- wp:group {"tagName":"main","style":{"spacing":{"padding":{"top":"var:preset|spacing|0","bottom":"var:preset|spacing|0"},"blockGap":"var:preset|spacing|80"}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group" style="padding-top:var(--wp--preset--spacing--0);padding-bottom:var(--wp--preset--spacing--0)">
	<!-- wp:cover {"url":"<?php echo esc_url( get_theme_file_uri( 'assets/images/inner-banner-img1.jpg' ) ); ?>","id":23,"dimRatio":60,"overlayColor":"black","isUserOverlayColor":true,"minHeight":350,"align":"full","style":{"spacing":{"blockGap":"0","padding":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-cover alignfull" style="padding-top:0;padding-bottom:0;min-height:350px"><span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim-60 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-23" alt="" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/inner-banner-img1.jpg' ) ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"0","left":"0"}}}} -->
	<div class="wp-block-columns"><!-- wp:column {"width":"0%"} -->
	<div class="wp-block-column" style="flex-basis:0%"></div>
	<!-- /wp:column -->

	<!-- wp:column {"width":"100%","style":{"spacing":{"blockGap":"0"}}} -->
	<div class="wp-block-column" style="flex-basis:100%">
		<!-- wp:query-title {"type":"search"} /-->
		<!-- wp:search {"label":"Search","showLabel":false,"buttonText":"Search"} /-->
	</div>
	<!-- /wp:column -->

	<!-- wp:column {"width":"0%"} -->
	<div class="wp-block-column" style="flex-basis:0%"></div>
	<!-- /wp:column --></div>
	<!-- /wp:columns --></div></div>
	<!-- /wp:cover -->

	<!-- wp:pattern {"slug":"expose-business/query"} /-->
</main>
<!-- /wp:group -->
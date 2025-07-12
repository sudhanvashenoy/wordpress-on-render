<?php
/**
 * Title: 404
 * Slug: expose-business/404
 * Categories: text
 * Inserter: no
 *
 * @package expose-business
 * @since 1.0.0
 */

?>
<!-- wp:group {"tagName":"main","style":{"spacing":{"padding":{"top":"var:preset|spacing|0","bottom":"var:preset|spacing|0"}}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group" style="padding-top:var(--wp--preset--spacing--0);padding-bottom:var(--wp--preset--spacing--0)">
	<!-- wp:cover {"url":"<?php echo esc_url( get_theme_file_uri( 'assets/images/inner-banner-img1.jpg' ) ); ?>","id":23,"dimRatio":60,"overlayColor":"black","isUserOverlayColor":true,"minHeight":650,"align":"full","style":{"spacing":{"blockGap":"0","padding":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-cover alignfull" style="padding-top:0;padding-bottom:0;min-height:650px"><span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim-60 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-23" alt="" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/inner-banner-img1.jpg' ) ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"0","left":"0"}}}} -->
	<div class="wp-block-columns"><!-- wp:column {"width":"0%"} -->
	<div class="wp-block-column" style="flex-basis:0%"></div>
	<!-- /wp:column -->

	<!-- wp:column {"width":"100%","style":{"spacing":{"blockGap":"0"}}} -->
	<div class="wp-block-column" style="flex-basis:100%">
		<!-- wp:heading {"textAlign":"center","fontSize":"x-large"} -->
		<h2 class="wp-block-heading has-text-align-center has-x-large-font-size">
			<?php esc_html_e( 'Page not found', 'expose-business' ); ?></h2>
		<!-- /wp:heading -->
		<!-- wp:spacer -->
		<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		<!-- wp:paragraph --><p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'expose-business' ); ?></p><!-- /wp:paragraph -->
		<!-- wp:search {"label":"Search","showLabel":false,"buttonText":"Search"} /-->
	</div>
	<!-- /wp:column -->

	<!-- wp:column {"width":"0%"} -->
	<div class="wp-block-column" style="flex-basis:0%"></div>
	<!-- /wp:column --></div>
	<!-- /wp:columns --></div></div>
	<!-- /wp:cover -->



</main>
<!-- /wp:group -->
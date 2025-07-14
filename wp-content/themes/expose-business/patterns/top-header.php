<?php
/**
 * Title: Top Header
 * Slug: expose-business/top-header
 * Categories: theme, header
 *
 * @package expose-business
 * @since 1.0.0
 */

?>
<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|40","top":"var:preset|spacing|40","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}},"backgroundColor":"alter","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-alter-background-color has-background" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--20)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"31%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:31%"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|custom-heading"}}}},"textColor":"custom-heading","fontSize":"extra-small"} -->
<p class="has-custom-heading-color has-text-color has-link-color has-extra-small-font-size"><img class="wp-image-329" style="width: 15px;" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/header-img1.png' ) ); ?>" alt=""> <?php esc_html_e( 'Need Professional Advisor ?', 'expose-business' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"transparent","textColor":"highlight","className":"is-style-expose-business-flat-button","style":{"spacing":{"padding":{"left":"0","right":"0","top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|highlight"}}}},"fontSize":"extra-small"} -->
<div class="wp-block-button has-custom-font-size is-style-expose-business-flat-button has-extra-small-font-size"><a class="wp-block-button__link has-highlight-color has-transparent-background-color has-text-color has-background has-link-color wp-element-button" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php esc_html_e( 'Book Schedule', 'expose-business' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"56%","className":"bk-hide-tab bk-hide-mob","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
<div class="wp-block-column is-vertically-aligned-center bk-hide-tab bk-hide-mob" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:56%"></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"13%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:13%"><!-- wp:social-links {"iconColor":"contrast","iconColorValue":"#313131","size":"has-normal-icon-size","className":"is-style-logos-only","style":{"spacing":{"blockGap":{"top":"0","left":"var:preset|spacing|40"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<ul class="wp-block-social-links has-normal-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"twitter"} /-->

<!-- wp:social-link {"url":"#","service":"youtube"} /-->

<!-- wp:social-link {"url":"#","service":"linkedin"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
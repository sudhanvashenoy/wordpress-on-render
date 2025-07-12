<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aster_it_solutions
 */

get_header();

$aster_it_solutions_column = get_theme_mod( 'aster_it_solutions_archive_column_layout', 'column-1' );
?>
<main id="primary" class="site-main">
	<?php if ( have_posts() ) : ?>
		<div class="aster_it_solutions-archive-layout grid-layout <?php echo esc_attr( $aster_it_solutions_column ); ?>">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			endwhile;
			?>
		</div>
		<?php
		do_action( 'aster_it_solutions_posts_pagination' );
	else :
		get_template_part( 'template-parts/content', 'none' );
	endif;
	?>
</main>
<?php
if ( aster_it_solutions_is_sidebar_enabled() ) {
	get_sidebar();
}
get_footer();
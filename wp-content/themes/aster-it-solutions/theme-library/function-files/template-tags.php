<?php

/**
 * Custom template tags for this theme
 *
 * @package aster_it_solutions
 */

if ( ! function_exists( 'aster_it_solutions_posted_on_single' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time on single posts.
     */
    function aster_it_solutions_posted_on_single() {
        if ( get_theme_mod( 'aster_it_solutions_single_post_hide_date', false ) ) {
            return;
        }

        $aster_it_solutions_time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $aster_it_solutions_time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $aster_it_solutions_time_string = sprintf(
            $aster_it_solutions_time_string,
            esc_attr( get_the_date( DATE_W3C ) ),
            esc_html( get_the_date() ),
            esc_attr( get_the_modified_date( DATE_W3C ) ),
            esc_html( get_the_modified_date() )
        );

        $aster_it_solutions_posted_on = '<span class="post-date"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><i class="far fa-clock"></i>' . $aster_it_solutions_time_string . '</a></span>';

        echo $aster_it_solutions_posted_on; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
endif;

if ( ! function_exists( 'aster_it_solutions_posted_on' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function aster_it_solutions_posted_on() {
        if ( get_theme_mod( 'aster_it_solutions_post_hide_date', false ) ) {
            return;
        }

        $aster_it_solutions_time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $aster_it_solutions_time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $aster_it_solutions_time_string = sprintf(
            $aster_it_solutions_time_string,
            esc_attr( get_the_date( DATE_W3C ) ),
            esc_html( get_the_date() ),
            esc_attr( get_the_modified_date( DATE_W3C ) ),
            esc_html( get_the_modified_date() )
        );

        $aster_it_solutions_posted_on = '<span class="post-date"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><i class="far fa-clock"></i>' . $aster_it_solutions_time_string . '</a></span>';

        echo $aster_it_solutions_posted_on; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
endif;


if ( ! function_exists( 'aster_it_solutions_posted_by_single' ) ) :
    /**
     * Prints HTML with meta information for the current author on single posts.
     */
    function aster_it_solutions_posted_by_single() {
        if ( get_theme_mod( 'aster_it_solutions_single_post_hide_author', false ) ) {
            return;
        }
        $aster_it_solutions_byline = '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fas fa-user"></i>' . esc_html( get_the_author() ) . '</a>';

        echo '<span class="post-author"> ' . $aster_it_solutions_byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
endif;

if ( ! function_exists( 'aster_it_solutions_posted_by' ) ) :
    /**
     * Prints HTML with meta information for the current author.
     */
    function aster_it_solutions_posted_by() {
        if ( get_theme_mod( 'aster_it_solutions_post_hide_author', false ) ) {
            return;
        }
        $aster_it_solutions_byline = '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fas fa-user"></i>' . esc_html( get_the_author() ) . '</a>';

        echo '<span class="post-author"> ' . $aster_it_solutions_byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
endif;

	/**
	 * Prints HTML with meta information for the categories.
	 */

if ( ! function_exists( 'aster_it_solutions_categories_single_list' ) ) :
    function aster_it_solutions_categories_single_list( $aster_it_solutions_with_background = false ) {
        if ( is_singular( 'post' ) ) {
            $aster_it_solutions_hide_category = get_theme_mod( 'aster_it_solutions_single_post_hide_category', false );

            if ( ! $aster_it_solutions_hide_category ) {
                $aster_it_solutions_categories = get_the_category();
                $aster_it_solutions_separator  = '';
                $aster_it_solutions_output     = '';
                if ( ! empty( $aster_it_solutions_categories ) ) {
                    foreach ( $aster_it_solutions_categories as $aster_it_solutions_category ) {
                        $aster_it_solutions_output .= '<a href="' . esc_url( get_category_link( $aster_it_solutions_category->term_id ) ) . '">' . esc_html( $aster_it_solutions_category->name ) . '</a>' . $aster_it_solutions_separator;
                    }
                    echo trim( $aster_it_solutions_output, $aster_it_solutions_separator );
                }
            }
        }
    }
endif;

if ( ! function_exists( 'aster_it_solutions_categories_list' ) ) :
    function aster_it_solutions_categories_list( $aster_it_solutions_with_background = false ) {
        $aster_it_solutions_hide_category = get_theme_mod( 'aster_it_solutions_post_hide_category', true );

        if ( ! $aster_it_solutions_hide_category ) {
            $aster_it_solutions_categories = get_the_category();
            $aster_it_solutions_separator  = '';
            $aster_it_solutions_output     = '';
            if ( ! empty( $aster_it_solutions_categories ) ) {
                foreach ( $aster_it_solutions_categories as $aster_it_solutions_category ) {
                    $aster_it_solutions_output .= '<a href="' . esc_url( get_category_link( $aster_it_solutions_category->term_id ) ) . '">' . esc_html( $aster_it_solutions_category->name ) . '</a>' . $aster_it_solutions_separator;
                }
                echo trim( $aster_it_solutions_output, $aster_it_solutions_separator );
            }
        }
    }
endif;

if ( ! function_exists( 'aster_it_solutions_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the tags and comments.
	 */
	function aster_it_solutions_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() && is_singular() ) {
			$aster_it_solutions_hide_tag = get_theme_mod( 'aster_it_solutions_post_hide_tags', false );

			if ( ! $aster_it_solutions_hide_tag ) {
				/* translators: used between list items, there is a space after the comma */
				$aster_it_solutions_tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'aster-it-solutions' ) );
				if ( $aster_it_solutions_tags_list ) {
					/* translators: 1: list of tags. */
					printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'aster-it-solutions' ) . '</span>', $aster_it_solutions_tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
			}
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'aster-it-solutions' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'aster_it_solutions_post_thumbnail' ) ) :
    /**
     * Display the post thumbnail.
     */
    function aster_it_solutions_post_thumbnail() {
        // Return early if the post is password protected, an attachment, or does not have a post thumbnail.
        if ( post_password_required() || is_attachment() ) {
            return;
        }

        // Display post thumbnail for singular views.
        if ( is_singular() ) :
            // Check theme setting to hide the featured image in single posts.
            if ( get_theme_mod( 'aster_it_solutions_single_post_hide_feature_image', false ) ) {
                return;
            }
            ?>
            <div class="post-thumbnail">
                <?php 
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail(); 
                } else {
                    // URL of the default image
                    $aster_it_solutions_default_image_url = get_template_directory_uri() . '/resource/img/default.png';
                    echo '<img src="' . esc_url( $aster_it_solutions_default_image_url ) . '" alt="' . esc_attr( get_the_title() ) . '">';
                }
                ?>
            </div><!-- .post-thumbnail -->
        <?php else :
            // Check theme setting to hide the featured image in non-singular posts.
            if ( get_theme_mod( 'aster_it_solutions_post_hide_feature_image', false ) ) {
                return;
            }
            ?>
            <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
                <?php
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail(
                        'post-thumbnail',
                        array(
                            'alt' => the_title_attribute(
                                array(
                                    'echo' => false,
                                )
                            ),
                        )
                    );
                } else {
                    // URL of the default image
                    $aster_it_solutions_default_image_url = get_template_directory_uri() . '/resource/img/default.png';
                    echo '<img src="' . esc_url( $aster_it_solutions_default_image_url ) . '" alt="' . esc_attr( get_the_title() ) . '">';
                }
                ?>
            </a>
        <?php endif; // End is_singular().
    }
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;
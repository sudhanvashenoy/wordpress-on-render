<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aster_it_solutions
 */

?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>

<?php 
  if ( ! is_active_sidebar( 'sidebar-1' )) { ?>
	<aside id="secondary" class="widget-area">
		<section id="Search" class="widget widget_block widget_archive " >
		    <h2 class="widget-title"><?php esc_html_e('Search', 'aster-it-solutions'); ?></h2>
		    <?php get_search_form(); ?>
		</section>
		<section id="archives" class="widget widget_block widget_archive " >
		    <h2 class="widget-title"><?php esc_html_e('Archives', 'aster-it-solutions'); ?></h2>
		    <ul>
		        <?php
		        wp_get_archives(array(
		            'type'            => 'monthly',
		            'show_post_count' => true,
		        ));
		        ?>
		    </ul>
		</section>
		<section id="categories" class="widget widget_categories" role="complementary">
		    <h2 class="widget-title"><?php esc_html_e('Categories', 'aster-it-solutions'); ?></h2>
		    <ul>
		        <?php
		        wp_list_categories(array(
		            'orderby'    => 'name',
		            'title_li'   => '',
		            'show_count' => true,
		        ));
		        ?>
		    </ul>
		</section>
		<section id="tags" class="widget widget_tag_cloud" role="complementary">
		    <h2 class="widget-title"><?php esc_html_e('Tags', 'aster-it-solutions'); ?></h2>
		    <?php
				$aster_it_solutions_tags = get_tags();
				if ($aster_it_solutions_tags) {
				    echo '<div class="tag-cloud">';
				    foreach ($aster_it_solutions_tags as $aster_it_solutions_tag) {
				        $aster_it_solutions_tag_link = get_tag_link($aster_it_solutions_tag->term_id);
				        echo '<a href="' . esc_url($aster_it_solutions_tag_link) . '" style="font-size:' . esc_attr($aster_it_solutions_tag->font_size) . 'px;" class="tag-link">' . esc_html($aster_it_solutions_tag->name) . '</a>';
				    }
				    echo '</div>';
				} else {
				    echo '<p>No tags found.</p>';
				}
			?>
		</section>
		<section id="recent-posts" class="widget" role="complementary">
		    <h2 class="widget-title"><?php esc_html_e('Recent Posts', 'aster-it-solutions'); ?></h2>
		    <ul class="recent-posts-list">
		        <?php
		        $aster_it_solutions_recent_posts = get_posts(array(
		            'numberposts' => 5, // Adjust the number of posts to display
		            'post_status' => 'publish',
		        ));

		        foreach ($aster_it_solutions_recent_posts as $post) :
		            setup_postdata($post);
		            ?>
		            <li>
		                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		            </li>
		            <?php
		        endforeach;
		        wp_reset_postdata();
		        ?>
		    </ul>
		</section>
	</aside><!-- #secondary -->
<?php } ?>
<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package School_Theme
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php if ( have_posts() ) : ?>

        <?php
        /* Start the Loop */
        while ( have_posts() ) :
            the_post();
            ?>
            <article>
                <h2><?php the_title(); ?></h2>
                <?php the_post_thumbnail( 'portrait-blog' ); 
                the_content();

                // Get the terms associated with the current post
                $terms = get_the_terms( get_the_ID(), 'school-site-students-taxonomy' );

                // Get the current term slugs
                $current_term_slugs = array();
                if ( $terms && ! is_wp_error( $terms ) ) {
                    foreach ( $terms as $term ) {
                        $current_term_slugs[] = $term->slug;
                    }
                }

                // Query posts with the same terms but exclude the current post
                $args = array(
                    'post_type'      => 'school-site-students',
                    'posts_per_page' => -1,
                    'tax_query'      => array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => 'school-site-students-taxonomy',
                            'field'    => 'slug',
                            'terms'    => $current_term_slugs,
                        ),
                    ),
                    'post__not_in'   => array( get_the_ID() ), // Exclude the current post
                );

                $query = new WP_Query( $args );
                if ( $query->have_posts() ) {
                    echo '<h3>Other Posts:</h3>';
                    while ( $query->have_posts() ) {
                        $query->the_post();
                        echo '<a href="' . esc_url( get_permalink() ) . '">' . get_the_title() . '</a><br>';
                    }
                    wp_reset_postdata();
                } else {
                    echo '<p>No other posts found.</p>';
                }
                ?>
            </article>
        <?php
        endwhile;

        the_posts_navigation();

    else :

        get_template_part( 'template-parts/content', 'none' );

    endif;
    ?>

</main><!-- #primary -->

<?php
get_footer();
?>

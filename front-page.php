<?php
/**
 * The template for displaying front pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package School_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">
        <?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', 'page' );
		endwhile; // End of the loop.
		?>
    
    <section class="recent-news">
		<h2>Recent News</h2>
		<div class="recent-news-container">
        <?php
        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => 3,
            'order'          => 'DESC',
        );

        $recent_news = new WP_Query( $args );

        if ( $recent_news->have_posts() ) :
            while ( $recent_news->have_posts() ) :
                $recent_news->the_post();
        ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'medium' ); ?>
							</a>
                        <?php endif; ?>
                        <h3 class="entry-title">
                            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                        </h3>
                    </header>
                </article>
				<?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
	<p><a href="<?php echo site_url( 'news' ) ?>">See all news</a></p>
	</section>
	</main><!-- #main -->

<?php
get_footer();

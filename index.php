<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package School_Theme
 */

get_header();
?>

	<main id="primary" class="news-site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1>News</h1>
					<h2 class="page-title screen-reader-text"><?php single_post_title(); ?></h2>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
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
	</main>

<?php
get_sidebar();
get_footer();

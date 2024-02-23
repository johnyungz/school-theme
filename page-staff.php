<?php
/**
 * The template for displaying the Staff Page
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
    <div class="staff-entry-content">
		<?php 
		echo "<h1> ".get_the_title()." </h1>";
		?>
        <p>Our dedicated staff is here to help our students succeed. You will find the faculty and administrative staff listed below. Please contact the appropriate individual with any questions. Vestibulum pretium neque leo, nec euismod ex interdum vitae. Etiam viverra, lorem sed lobortis mattis, lectus enim eleifend nisi, non dapibus nulla purus malesuada risus. Donec consectetur neque turpis, vitae varius lectus commodo vel.</p>
        
        <?php
        // Display Faculty staff members
        $faculty_args = array(
            'post_type' => 'fwd-staff',
            'tax_query' => array(
                array(
                    'taxonomy' => 'fwd-staff-category',
                    'field'    => 'slug',
                    'terms'    => 'faculty',
                ),
            ),
        );
        $faculty_query = new WP_Query( $faculty_args );

        if ( $faculty_query->have_posts() ) :
            echo '<h2>Faculty</h2>';
            echo '<div class="staff-faculty-section">';
            while ( $faculty_query->have_posts() ) : $faculty_query->the_post();
                ?>
                <div class="staff-member">
                    <h3><?php the_title(); ?></h3>
                    <p><?php the_field('short_staff_biography'); ?></p>
                    <p><?php the_field('courses'); ?></p>
                    <p><a href="<?php the_field('link'); ?>">Instructor Website</a></p>
                </div>
                <?php
            endwhile;
            echo '</div>';
            wp_reset_postdata();
        endif;

        // Display Administrative staff members
        $admin_args = array(
            'post_type' => 'fwd-staff',
            'tax_query' => array(
                array(
                    'taxonomy' => 'fwd-staff-category',
                    'field'    => 'slug',
                    'terms'    => 'administrative',
                ),
            ),
        );
        $admin_query = new WP_Query( $admin_args );

        if ( $admin_query->have_posts() ) :
            echo '<h2>Administrative</h2>';
            echo '<div class="staff-admin-section">';
            while ( $admin_query->have_posts() ) : $admin_query->the_post();
                ?>
                <div class="staff-member">
                    <h3><?php the_title(); ?></h3>
                    <p><?php the_field('short_staff_biography'); ?></p>
                </div>
                <?php
            endwhile;
            echo '</div>';
            wp_reset_postdata();
        endif;
        ?>
    </div>
</main>

<?php
get_footer();

<?php
/**
 * The template for displaying the course schedule page
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
	<div class="schedule-entry-content">
		<?php 
		echo "<h1> ".get_the_title()." </h1>";
		?>
		<p>This is the schedule for the upcoming week of classes. It is updated every Sunday evening. Lorem ipsum cras nec dui sodales, congue lacus quis, aliquam ante. Aenean enim nisi, venenatis eu lectus commodo, tristique posuere ligula. Nam velit erat, mollis tincidunt auctor id, hendrerit eget turpis.</p>
    <?php
    while ( have_posts() ) :
        the_post();

        if ( function_exists( 'have_rows' ) && have_rows('weekly_course_schedule') ) {
			echo '<p class="weekly-course-schedule">Weekly Course Schedule</p>';
            echo '<table>';
			echo '<tr>';
			echo '<th>Date</th>';
			echo '<th>Course</th>';
			echo '<th>Instructor</th>';
			echo '</tr>';
            while ( have_rows('weekly_course_schedule') ) : the_row();
                $date = get_sub_field('date');
                $course = get_sub_field('course');
                $instructor = get_sub_field('instructor');

                echo '<tr>';
                if ( $date ) {
                    echo '<td>' . esc_html( $date ) . '</td>';
                }
                if ( $course ) {
                    echo '<td>' . esc_html( $course ) . '</td>';
                }
                if ( $instructor ) {
                    echo '<td>' . esc_html( $instructor ) . '</td>';
                }
                echo '</tr>';
            endwhile;
            echo '</table>'; 
        }

        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;

    endwhile; // End of the loop.
    ?>
	</div>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();

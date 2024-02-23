<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package School_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">
    <header class='students-header'>
      <h1>The Class</h1>
    </header>

<?php
$args = array(
  'post_type'      => 'school-site-students',
  'posts_per_page' => -1,
  'order'          => 'ASC',
  'orderby'        => 'title'
);

$query = new WP_Query( $args );
  echo "<section class='students-container'>";
if ( $query -> have_posts() ) {
  while ( $query -> have_posts() ) {
      $query -> the_post();
      ?>
      <article class='student-card'>
        <?php
      echo "<h2><a href='".get_the_permalink()."'>".esc_html( get_the_title() ) .'</a></h2>';
      the_post_thumbnail( 'medium' );
      the_excerpt();
      $terms = get_the_terms($post->ID, 'school-site-students-taxonomy');
      
                if ($terms && !is_wp_error($terms)) {
                    $term = $terms[0];
                    $term_link = get_term_link($term);
                    if (!is_wp_error($term_link)) {
                        echo '<p>Specialty: <a href="' . esc_url($term_link) . '">' . esc_html($term->name) . '</a></p>';
                    }
                }
      ?>
      </article>
      <?php
  }
  wp_reset_postdata();
}
echo "</section>";

?>
  
     

	</main><!-- #main -->

<?php
get_footer();

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
  <section class='student-container'>
  <?php
$args = array(
  'post_type'      => 'school-site-students',
  'posts_per_page' => -1,
  'order'          => 'ASC',
  'orderby'        => 'title'
);

$query = new WP_Query( $args );
$terms = get_terms( 
  array(
      'taxonomy' => 'school-site-students-taxonomy',
  ) 
);
    if ( $terms && ! is_wp_error( $terms ) ) {
        foreach ( $terms as $term ) {
            $args = array(
              'post_type' => 'school-site-students',
              'posts_per_page' => -1,
              'tax_query'      => array(
                array(
          
                    'taxonomy' => 'school-site-students-taxonomy',
          
                    'field'   => 'slug',
          
                    'terms'   => $term->slug,


                ),
              ),
            );
           
            $query = new WP_Query ( $args );
            if ( $query -> have_posts() ) {
            
             while ($query -> have_posts()) {

               $query -> the_post();
               echo "<article class='student-card'>";
               ?>
               <a href="<?php the_permalink(); ?>">
                 <h2 id='student-card-title'><?php the_title();?></h2>
                 <?php the_post_thumbnail( 'large' ); ?>
               </a>
               <?php the_excerpt(); ?>
             <?php
              
               if(get_field( 'student_description' )){
                echo '<br>';
                the_field( 'student_description' );
               }
               
               ?>
               
             <a href="<?php echo get_term_link( $term ); ?>">Specialty:<?php 
             echo esc_html( $term->name ); ?></a>
             
             <?php
             echo '</article>';
             }
           
             wp_reset_postdata();
            }
           
          
          }
        }

      ?>

</section>  
	</main><!-- #main -->

<?php
get_footer();

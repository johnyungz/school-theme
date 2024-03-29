<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package School_Theme
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			
			
				<?php
        echo "<div>".get_custom_logo()."</div>";
				/* translators: 1: Theme name, 2: Theme author. */
        echo "<div class='names'>";
				printf( esc_html__( 'Theme: %1$s by %2$s', 'school-theme' ), 'school-theme', '<a href="http://johnyungzhou.com/school-site">John, Veronica</a>' );
        echo "</div>";

        echo "<div>";
        echo "<h3>links</h3>";
          wp_nav_menu(
            array(
              'theme_location' => 'footer',
              'menu_id'        => 'footer-menu',
            )
          );
          echo "</div>";
        
          ?>
			
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

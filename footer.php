<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage EchosOratos
 * @since EchosOratos 0.1
 */
?>

        </div><!-- #main -->
        <div id="footer-push"></div>
	</div><!-- #page -->

	<footer id="colophon" class="site-footer" role="contentinfo">
        <?php if ( is_single() ) twentythirteen_post_nav(); ?>
        <?php twentythirteen_paging_nav(); ?>
		<?php get_sidebar( 'main' ); ?>
		<div class="site-info">
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

	<?php wp_footer(); ?>
</body>
</html>

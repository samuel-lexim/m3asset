<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package m3asset
 */


$footer_mail      = get_field( 'footer_email', 'option' );
$footer_copyright = get_field( 'copyright', 'option' );

?>

	<footer id="footerId" class="site-footer">
		<div class="page-padding">
            <p><?= $footer_mail ?></p>
            <p><?= $footer_copyright ?></p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

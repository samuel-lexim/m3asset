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
		<div class="lr_pad _inner">

            <?php if ($footer_mail) { ?>
            <p class="darkBlue s14 fw700"><?= esc_html($footer_mail) ?></p>
            <?php } ?>

            <?php if ($footer_copyright) { ?>
            <p class="s13 fw400"><?= esc_html($footer_copyright) ?></p>
            <?php } ?>

        </div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

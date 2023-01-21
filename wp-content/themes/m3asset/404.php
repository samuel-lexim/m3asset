<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package m3asset
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">

            <div class="lr_pad">
                <header class="page-header">
                    <h1 class="page-title fw700"><?= esc_html( 'Oops! That page can&rsquo;t be found.'); ?></h1>
                </header>

                <div class="page-content">
                    <p class="h2 fw600"><?= esc_html( 'It looks like nothing was found at this location.'); ?></p>
                </div>
            </div>


		</section>

	</main>

<?php
get_footer();

<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package m3asset
 * Template Name: Contact Us Template
 */
?>

<?php get_header(); ?>

<div id="main" class="site-main page-main page-template contact-template" role="main">

    <?php
    // Start the loop.
    while (have_posts()) : the_post();
        $postId = get_the_ID();

        // Contact Form
        $pageTemplate = get_page_template_slug(); // templatePage-contact_us.php
        if ( $pageTemplate && 0 === validate_file( $pageTemplate ) ) {
            $pageTemplate = strtok($pageTemplate, '.');
            get_template_part('acf-layout/' . $pageTemplate);
        }

        // Page sections
        $page_sections = get_field('page_sections');
        if ($page_sections && is_array($page_sections)) {
            foreach ($page_sections as $section) {
                $layout = esc_attr($section['acf_fc_layout']);
                get_template_part('acf-layout/section', $layout, $section);
                ?>
            <?php } ?>

        <?php } ?>

    <?php
    endwhile;
    // End of the loop.
    ?>

</div><!-- .site-main -->

<?php get_footer(); ?>

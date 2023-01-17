<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package m3asset
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <header id="masthead" class="site-header">
        <div class="header_inner inner_bottom_header lr_pad">

            <div class="site-branding">
                <?php
                the_custom_logo();
                ?>
            </div>

            <div class="nav-button-wrap">
                <div class="nav-icon" id="NavMenuButton">
                    <span></span>
                </div>
            </div>

            <nav id="site-navigation" class="main-navigation">
                <button style="display: none" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                    <?php esc_html_e( 'Menu', 'm3asset' ); ?></button>
                <?php
                wp_nav_menu([
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'primary-menu',
                ]);
                ?>
            </nav><!-- #site-navigation -->
        </div>
    </header><!-- #masthead -->

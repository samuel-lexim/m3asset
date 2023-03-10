<?php
/**
 * m3asset functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package m3asset
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function m3asset_setup()
{
    /**
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on m3asset, use a find and replace
     * to change 'm3asset' to the name of your theme in all the template files.
     */
    load_theme_textdomain('m3asset', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /**
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support('title-tag');


    /**
     * Enable support for Post Thumbnails on posts and pages.
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'menu-1' => esc_html__('Primary', 'm3asset'),
        )
    );

    /**
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Set up the WordPress core custom background feature.
    add_theme_support(
        'custom-background',
        apply_filters(
            'm3asset_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo',
        array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        )
    );
}

add_action('after_setup_theme', 'm3asset_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function m3asset_content_width()
{
    $GLOBALS['content_width'] = apply_filters('m3asset_content_width', 640);
}

add_action('after_setup_theme', 'm3asset_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function m3asset_widgets_init()
{
    register_sidebar(
        array(
            'name' => esc_html__('Sidebar', 'm3asset'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'm3asset'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
}

add_action('widgets_init', 'm3asset_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function m3asset_scripts()
{
    wp_enqueue_style('m3asset-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_style_add_data('m3asset-style', 'rtl', 'replace');

    wp_enqueue_script('m3asset-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
    wp_enqueue_script('slick-1.8.1', get_template_directory_uri() . '/js/slick.min.js', array(), _S_VERSION, true);
    wp_enqueue_script('m3-script', get_template_directory_uri() . '/js/script.js', array(), _S_VERSION, true);

//    if (is_singular() && comments_open() && get_option('thread_comments')) {
//        wp_enqueue_script('comment-reply');
//    }
}

add_action('wp_enqueue_scripts', 'm3asset_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
//require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}


// =========================== START CUSTOMIZE
//add_theme_support('editor-gradient-presets', []);
//add_theme_support('disable-custom-gradients', true);

// Remove global-styles
remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
remove_action('wp_footer', 'wp_enqueue_global_styles', 1);

// Remove SVG tag on body
remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');

/* Disable WordPress Admin Bar for all users */
add_filter('show_admin_bar', '__return_false');

// Add slug column for PAGE posts
add_filter("manage_page_posts_columns", "page_columns");
function page_columns($columns)
{
    $type = get_post_type();
    $add_columns = array(
        'slug' => 'Slug',
    );

//    if ( $type === 'vtproduct' ) {
//        $more_columns = array(
//            'price'      => 'Regular Price',
//            'sale_price' => 'Sale Price'
//        );
//        $add_columns  = array_merge( $add_columns, $more_columns );
//    }

    $res = array_slice($columns, 0, 2, true) +
        $add_columns +
        array_slice($columns, 2, count($columns) - 1, true);


    return $res;
}

add_action("manage_page_posts_custom_column", "my_custom_page_columns");
function my_custom_page_columns($column)
{
    global $post;
    switch ($column) {
        case 'slug' :
            echo esc_attr($post->post_name);
            break;
        case 'price' :
            $regular_price = get_field('regular_price', $post);
            echo esc_html(number_format(floatval($regular_price)));
            break;
        case 'sale_price' :
            $sale_price = get_field('sale_price', $post);
            echo esc_html(number_format(floatval($sale_price)));
            break;
    }
}

add_filter("manage_post_posts_columns", "page_columns");
add_action("manage_post_posts_custom_column", "my_custom_page_columns");
//add_filter( "manage_vtproduct_posts_columns", "page_columns" );
//add_action( "manage_vtproduct_posts_custom_column", "my_custom_page_columns" );

// END - Add slug column for PAGE posts

// Start - Images
// Remove default image sizes here.
function remove_extra_image_sizes()
{
    foreach (get_intermediate_image_sizes() as $size) {
        if (!in_array($size, array('thumbnail', 'medium', 'large'))) {
            remove_image_size($size);
        }
    }
}

add_action('init', 'remove_extra_image_sizes');
update_option('medium_large_size_w', 150);
// END - Images


/**
 * Add section in admin page
 * @position function.php
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(
        array(
            'page_title' => 'Options Page',
            'menu_title' => 'Options Page Settings',
            'menu_slug' => 'options-page-settings',
            'capability' => 'edit_posts',
            'redirect' => true
        )
    );
    acf_add_options_sub_page(
        array(
            'page_title' => 'General Settings',
            'menu_title' => 'General Settings',
            'parent_slug' => 'options-page-settings'
        )
    );
    acf_add_options_sub_page(
        array(
            'page_title' => 'Header Settings',
            'menu_title' => 'Header Settings',
            'parent_slug' => 'options-page-settings'
        )
    );
    acf_add_options_sub_page(
        array(
            'page_title' => 'Footer Settings',
            'menu_title' => 'Footer Settings',
            'parent_slug' => 'options-page-settings'
        )
    );
}


// Remove prefix in archive title
add_action('get_the_archive_title_prefix', 'get_the_archive_title_prefix_action');
function get_the_archive_title_prefix_action($prefix): string
{
    return '';
}

/**
 * @return string
 */
function getNoImageSrc(): string
{
    return esc_url(get_template_directory_uri() . '/images/placeholder.jpg');
}

/**
 * @param string $defaultImg
 *
 * @return string
 */
function getDefaultImg(string $defaultImg = 'default-hero.jpg'): string
{
    return esc_url(get_template_directory_uri() . '/images/' . $defaultImg);
}

/**
 * Convert string to slug
 * @param $str
 * @param string $delimiter
 * @return string
 */
function createSlug($str, string $delimiter = '-'): string
{
    $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter,
        preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/&/', 'and', preg_replace('/\'/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
    return esc_attr($slug);
}

/**
 * Get custom logo base on image ID
 * @param $imgId
 * @return string
 */
function getCustomLogoById($imgId): string
{
    $html = '';

    // We have a logo. Logo is go.
    if ($imgId) {
        $custom_logo_attr = array(
            'class' => 'custom-logo',
            'loading' => false,
        );

        $unlink_homepage_logo = (bool)get_theme_support('custom-logo', 'unlink-homepage-logo');

        if ($unlink_homepage_logo && is_front_page() && !is_paged()) {
            /*
             * If on the home page, set the logo alt attribute to an empty string,
             * as the image is decorative and doesn't need its purpose to be described.
             */
            $custom_logo_attr['alt'] = '';
        } else {
            /*
             * If the logo alt attribute is empty, get the site title and explicitly pass it
             * to the attributes used by wp_get_attachment_image().
             */
            $image_alt = get_post_meta($imgId, '_wp_attachment_image_alt', true);
            if (empty($image_alt)) {
                $custom_logo_attr['alt'] = get_bloginfo('name', 'display');
            }
        }


        /*
         * If the alt attribute is not empty, there's no need to explicitly pass it
         * because wp_get_attachment_image() already adds the alt attribute.
         */
        $image = wp_get_attachment_image($imgId, 'full', false, $custom_logo_attr);

        if ($unlink_homepage_logo && is_front_page() && !is_paged()) {
            // If on the home page, don't link the logo to home.
            $html = sprintf(
                '<span class="custom-logo-link">%1$s</span>',
                $image
            );
        } else {
            $aria_current = is_front_page() && !is_paged() ? ' aria-current="page"' : '';

            $html = sprintf(
                '<a href="%1$s" class="custom-logo-link" rel="home"%2$s>%3$s</a>',
                esc_url(home_url('/')),
                $aria_current,
                $image
            );
        }
    }

    return $html;
}

/**
* Block URLs from inside form on Single Line Text and Paragraph Text form fields
*
* @link https://wpforms.com/developers/how-to-block-urls-inside-the-form-fields/
*/
function wpf_dev_check_for_urls( $field_id, $field_submit, $form_data ) {
    //Create your list of profanity words separated by commas
    if ( containsUrl($field_submit) ) {
        wpforms()->process->errors[ $form_data[ 'id' ] ][ $field_id ] = esc_html__( 'Invalid content.', 'wpforms' );        return;
    }
}
add_action( 'wpforms_process_validate_textarea', 'wpf_dev_check_for_urls', 10, 3 );
//add_action( 'wpforms_process_validate_text', 'wpf_dev_check_for_urls', 10, 3 );

function containsUrl($string) {
    return preg_match("/[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]\.[a-z]{2,}/i", $string);
}



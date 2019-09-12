<?php
/**
 * @package     benko
 * @version     1.0
 * @author      NanoAgency
 * @link        http://www.nanoagency.co
 * @copyright   Copyright (c) 2016 NanoAgency
 * @license     GPL v2
 */

/*  Setup Theme ===================================================================================================== */
add_action( 'after_setup_theme', 'benko_theme_setup' );
if ( ! function_exists( 'benko_theme_setup' ) ) :
    function benko_theme_setup() {
        load_theme_textdomain( 'benko', get_template_directory() . '/languages' );

        //  Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        //  Let WordPress manage the document title.
        add_theme_support( 'title-tag' );

        //  Enable support for Post Thumbnails on posts and pages.
        add_theme_support( 'post-thumbnails' );

        add_theme_support( 'customize-selective-refresh-widgets' );

        //Enable support for Post Formats.
        add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
        ) );

        add_theme_support( 'post-formats', array(
            'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
        ) );

        add_theme_support( 'editor-styles' );

        add_editor_style( array( 'assets/css/editor-style.css', benko_font_url() ) );

        add_theme_support( 'custom-header' );

        add_theme_support( 'custom-background' );

        add_theme_support( "title-tag" );

        // Indicate widget sidebars can use selective refresh in the Customizer.
        add_theme_support( 'customize-selective-refresh-widgets' );
    }
endif;

/* Thumbnail Sizes ================================================================================================== */
set_post_thumbnail_size( 220, 150, true);

add_image_size( 'benko-single', 1000 ,530, true);
add_image_size( 'benko-single-full', 1300 ,600, true);


add_image_size( 'benko-blog-list', 600 ,350, true);
add_image_size( 'benko-blog-square', 120 ,100, true);
add_image_size( 'benko-blog-list-large', 500 ,350, true);

add_image_size( 'benko-blog-tran', 510 ,290, true);
add_image_size( 'benko-blog-trans-vertical', 384 ,527, true);
add_image_size( 'benko-blog-tran-large', 895 ,420, true);

add_image_size( 'benko-blog-video', 1000,489, true);
add_image_size( 'benko-blog-video-widget', 330,150, true);
add_image_size( 'benko-video', 241,120, true);

add_image_size( 'benko-blog-grid', 768 ,450, true);
add_image_size( 'benko-blog-featured', 437 ,217, true);
add_image_size( 'benko-blog-grid-large', 768 ,400, true);
add_image_size( 'benko-blog-grid-big', 1000 ,450, true);
add_image_size( 'benko-blog-grid-vertical',330,360, true);

add_image_size( 'benko-blog-vertical', 467 ,550, true);
add_image_size( 'benko-video-large',870,489,true);
add_image_size( 'benko-video-horizontal',895,503,true);

add_image_size( 'benko-sidebar', 124 ,100, true);

add_image_size( 'benko-related-image',370,247,true);

/* Setup Font ======================================================================================================= */
function benko_font_url() {
    $fonts_url = '';
    $poppins     = _x( 'on', 'Roboto font: on or off', 'benko' );
    if ( 'off' !== $poppins ) {
        $font_families = array();
        if ( 'off' !== $poppins ) {
            $font_families[] = 'Roboto:300,300i,400,500,700';
        }
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );

        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
    }

    return esc_url_raw( $fonts_url );
}


/* Load Front-end scripts  ========================================================================================== */
add_action( 'wp_enqueue_scripts', 'benko_theme_scripts');
function benko_theme_scripts() {

    // Add  fonts, used in the main stylesheet.
    wp_enqueue_style( 'benko-fonts', benko_font_url(), array(), null );
    //style plugins
    wp_enqueue_style('bootstrap',get_template_directory_uri().'/assets/css/bootstrap.min.css', array(), '3.0.2 ');
    wp_enqueue_style('awesome-font',get_template_directory_uri().'/assets/css/font-awesome.min.css', array(), '4.6.3');
    wp_enqueue_style('jquery-ui',get_template_directory_uri().'/assets/css/jquery-ui.min.css', array(), '1.11.4');
    wp_enqueue_style('themify-icons',get_template_directory_uri().'/assets/css/themify-icons.css', array(),null);
    wp_enqueue_style('photoswipe',get_template_directory_uri().'/assets/css/photoswipe.css', array(), null);
    wp_enqueue_style('default-skin',get_template_directory_uri().'/assets/css/default-skin/default-skin.css', array(), null);
    //style MAIN THEME
    wp_enqueue_style( 'benko-main', get_template_directory_uri(). '/style.css', array(), null );
    //style skin
    wp_enqueue_style('benko-style', get_template_directory_uri().'/assets/css/style-default.min.css' );

    //register all plugins
    wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/assets/js/plugins/bootstrap.min.js', array(), '2.2.0', true );
    wp_enqueue_script( 'html5', get_template_directory_uri().'/assets/js/plugins/html5.min.js', array(), '2.2.0', true );
    wp_enqueue_script( 'slicknav', get_template_directory_uri().'/assets/js/plugins/jquery.slicknav.min.js', array(), '2.2.0', true );
    wp_enqueue_script( 'skip-link-focus', get_template_directory_uri().'/assets/js/plugins/skip-link-focus-fix.min.js', array(), '2.2.0', true );
    wp_enqueue_script( 'slick', get_template_directory_uri().'/assets/js/plugins/slick.min.js', array(), '2.2.0', true );

    wp_enqueue_script( 'isotope', get_template_directory_uri().'/assets/js/plugins/isotope.pkgd.min.js', array(), '2.2.0', true );
    wp_enqueue_script( 'lazy', get_template_directory_uri().'/assets/js/plugins/jquery.lazy.min.js', array(), '1.7.10', true );

    wp_enqueue_script( 'videoController', get_template_directory_uri().'/assets/js/plugins/jquery.videoController.min.js', array(), '2.2.0', true );

    wp_register_script('tweets-widgets', get_template_directory_uri().'/assets/js/plugins/tweets-widgets.min.js','jquery', '2.3.0', true);

    wp_enqueue_script('jquery-masonry');

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    if ( is_singular()){
        wp_register_script( 'photoswipe', get_template_directory_uri().'/assets/js/plugins/photoswipe.min.js', array(), null, true );
        wp_register_script( 'photoswipe-ui-default', get_template_directory_uri().'/assets/js/plugins/photoswipe-ui-default.min.js', array(), null, true );
    }

    if ( is_singular() && wp_attachment_is_image() ) {
        wp_enqueue_script( 'benko-theme-keyboard-image-navigation', get_template_directory_uri() . '/assets/js/keyboard-image-navigation.min.js', array( 'jquery' ), '20141010' );
    }

    //jquery MAIN THEME
    wp_enqueue_script('benko-init', get_template_directory_uri() . '/assets/js/dev/benko-init.js', array('jquery'),null, true);
    wp_enqueue_script('benko', get_template_directory_uri() . '/assets/js/dev/benko.js', array('jquery'),null, true);

}

/* Load Back-end SCRIPTS============================================================================================= */
function benko_js_enqueue()
{
    wp_enqueue_media();
    wp_enqueue_style('thickbox');
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    // moved the js to an external file, you may want to change the path
    wp_enqueue_script('information_js',get_template_directory_uri(). '/assets/js/widget.min.js', 'jquery', '1.0', true);
}
add_action('admin_enqueue_scripts', 'benko_js_enqueue');

/* Register the required plugins    ================================================================================= */
add_action( 'tgmpa_register', 'benko_register_required_plugins' );
function benko_register_required_plugins() {

    $plugins = array(
        // This is an example of how to include a plugin pre-packaged with a theme.
        array(
            'name'      => esc_html__( 'Nano Core Plugin', 'benko' ),
            'slug'      => 'theme-core',
            'source'    => get_template_directory() . '/inc/theme-plugins/theme-core.zip',
            'required'  => true,
            'version'   => '1.0.0',
            'force_activation' => false,
            'force_deactivation' => false,
            'image_url' => get_template_directory_uri() . '/inc/backend/assets/images/plugins/nano.jpg',

        ),
        //Contact form 7
        array(
            'name'      => esc_html__('Contact Form 7', 'benko' ),
            'slug'      => 'contact-form-7',
            'required'  => false,
            'image_url' => get_template_directory_uri() . '/inc/backend/assets/images/plugins/contact-form7.jpg',
        ),
        //WPBakery Visual Composer
        array(
            'name'      =>  esc_html__('WPBakery Visual Compose', 'benko' ),
            'slug'      => 'js_composer',
            'source'    => get_template_directory() . '/inc/theme-plugins/js_composer.zip',
            'required'  => true,
            'version'   => '5.6',
            'image_url' => get_template_directory_uri() . '/inc/backend/assets/images/plugins/vc.jpg',
        ),
        //MailChimp for WordPress
        array(
            'name'      =>  esc_html__('MailChimp for WordPress ', 'benko' ),
            'slug'      => 'mailchimp-for-wp',
            'required'  => false,
            'image_url' => get_template_directory_uri() . '/inc/backend/assets/images/plugins/mailchimp.jpg',
        ),
        //Loco Translate
        array(
            'name'      =>  esc_html__('Loco Translate', 'benko' ),
            'slug'      => 'loco-translate',
            'required'  => false,
        ),
        //Classic Editor
        array(
            'name'      =>  esc_html__('Classic Editor', 'benko' ),
            'slug'      => 'classic-editor',
            'required'  => false,
        ),

    );

    $config = array(
        'id'           => 'benko',                   // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                       // Default absolute path to pre-packaged plugins.
        'has_notices'  => true,
        'menu'         => 'tgmpa-install-plugins',  // Menu slug.
        'dismiss_msg'  => '',                       // If 'dismissable' is false, this message will be output at top of nag.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'is_automatic' => true,                     // Automatically activate plugins after installation or not.
        'message'      => '',                       // Message to output right before the plugins table.

    );

    tgmpa( $plugins, $config );

}

/* Register Navigation ============================================================================================== */
register_nav_menus( array(
    'primary_navigation'    => esc_html__( 'Primary Navigation', 'benko' ),
) );

/* Register Sidebar ================================================================================================= */
function benko_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Archive', 'benko' ),
        'id'            => 'archive',
        'description'   => esc_html__( 'Add a widget here to appear in the sidebar of Archive post.', 'benko' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar 1', 'benko' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add a widget here to appear in the sidebar of your Homepage.', 'benko' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Single', 'benko' ),
        'id'            => 'single',
        'description'   => esc_html__( 'Add a widget here to appear in the sidebar of Single post', 'benko' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar(array(
        'name' => esc_html__('Footer 1','benko'),
        'id'   => 'footer-1',
        'description'   => esc_html__( 'Add the widget here to appear in the first Footer column.', 'benko' ),
        'before_widget' => '<div id="%1$s" class="widget first %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer 2','benko'),
        'id'   => 'footer-2',
        'description'   => esc_html__( 'Add the widget here to appear in the second Footer column.', 'benko' ),
        'before_widget' => '<div id="%1$s" class="widget first %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer 3','benko'),
        'id'   => 'footer-3',
        'description'   => esc_html__( 'Add the widget here to appear in the 3rd Footer column.', 'benko' ),
        'before_widget' => '<div id="%1$s" class="widget first %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Topbar Left','benko'),
        'id'   => 'topbar-left',
        'description'   => esc_html__( 'Add widgets containing Text  or Navigation  widget  to Topbar.', 'benko' ),
        'before_widget' => '<div id="%1$s" class="widget first %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Topbar Right','benko'),
        'id'   => 'topbar-right',
        'description'   => esc_html__( 'Add widgets containing Text  or Social widget  to Topbar.', 'benko' ),
        'before_widget' => '<div id="%1$s" class="widget first %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Header Ad','benko'),
        'description'   => esc_html__( 'Add widgets containing code or static images to Header.', 'benko' ),
        'id'   => 'header-ads',
        'before_widget' => '<div id="%1$s" class="widget first %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Custom Copy Right','benko'),
        'id'   => 'copy-right',
        'before_widget' => '<div id="%1$s" class="widget first %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
}
add_action( 'widgets_init', 'benko_widgets_init' );
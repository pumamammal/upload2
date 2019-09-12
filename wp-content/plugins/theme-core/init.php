<?php
/**
 * Plugin Name: Nano Core Plugin
 * Plugin URI: http://www.nanoagency.co
 * Description: This is not just a plugin, it is a package with many tools a website needed.
 * Author: Nanoagency
 * Version: 1.0.0
 * Author URI: http://www.nanoagency.co
 * Text Domain: nano
*/

require_once('core-config.php');
require_once('inc/helpers/vc.php');

/*  Include Meta Box ================================================================================================ */
require_once( 'inc/meta-box/meta-box-master/meta-box.php');
require_once( 'inc/meta-box/meta-boxes.php');

/*  Include Post Format ============================================================================================= */
require_once( 'inc/vafpress-post-formats/vp-post-formats-ui.php');

/*  Importer ======================================================================================================== */
require_once( 'inc/importer/sample.php');
require_once( 'inc/importer/wp-importer.php');

/*  Custom post type ================================================================================================ */
require_once  'inc/post-types/banner.php';
require_once  'inc/post-types/testimonial.php';

/*  Shortcode ======================================================================================================= */
require_once( 'inc/shortcode/na_blog.php');
require_once( 'inc/shortcode/na_blogs_top.php');
require_once( 'inc/shortcode/na_blogs_post.php');
require_once( 'inc/shortcode/na_blog_box.php');
require_once( 'inc/shortcode/na_blog_video.php');
require_once( 'inc/shortcode/na_blogs_featured.php');
require_once( 'inc/shortcode/na_banners.php');
require_once( 'inc/shortcode/na_video.php');
require_once( 'inc/shortcode/na_info_teams.php');

/*  Widgets ========================================================================================================= */
require_once( 'inc/widgets/social.php');
require_once( 'inc/widgets/search.php');
require_once( 'inc/widgets/tabs-post.php');
require_once( 'inc/widgets/contact-info.php');
require_once( 'inc/widgets/videos.php');
require_once( 'inc/widgets/twitter.php');
require_once( 'inc/widgets/featured-post.php');
require_once( 'inc/widgets/instagram.php');
require_once( 'inc/widgets/fb-page.php');
require_once( 'inc/widgets/popular-tags.php');
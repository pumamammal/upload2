<?php
/**
 * @package     benko
 * @version     1.0
 * @author      NanoAgency
 * @link        http://www.nanoagency.co
 * @copyright   Copyright (c) 2016 NanoAgency
 * @license     GPL v2
 */

/* Keep Menu =========================================================================================================*/
if(!function_exists('benko_keep_menu')){
    function benko_keep_menu() {
        $configMenu = get_theme_mod('benko_keep_menu',false);
        if(isset($configMenu) & $configMenu == '1'){
            $configMenu='header-fixed';
        }
        return $configMenu;
    }
}

/* Customize font Google  =========================================================================================== */
if(!function_exists('benko_googlefont')){
    function benko_googlefont(){
        global $wp_filesystem;
        $filepath = get_template_directory().'/assets/googlefont/googlefont.json';
        if( empty( $wp_filesystem ) ) {
            require_once( ABSPATH .'/wp-admin/includes/file.php' );
            WP_Filesystem();
        }
        if( $wp_filesystem ) {
            $listGoogleFont=$wp_filesystem->get_contents($filepath);
        }
        if($listGoogleFont){
            $gfont = json_decode($listGoogleFont);
            $fontarray = $gfont->items;
            $options = array();
            foreach($fontarray as $font){
                $options[$font->family] = $font->family;
            }
            return $options;
        }
        return false;
    }
}

/* Customize font Google  =========================================================================================== */
function benko_get_categories_select() {
    $teh_cats = get_categories();
    $results=array();
    $count = count($teh_cats);
    for ($i=0; $i < $count; $i++) {
        if (isset($teh_cats[$i]))
            $results[$teh_cats[$i]->slug] = $teh_cats[$i]->name;
        else
            $count++;
    }
    return $results;
}

/* Post Thumbnail =================================================================================================== */
if ( ! function_exists( 'benko_post_thumbnail' ) ) :
    function benko_post_thumbnail() {
        if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
            return;
        }

        if ( is_singular() ) :
            ?>

            <div class="post-thumbnail">
                <?php the_post_thumbnail(); ?>
            </div><!-- .post-thumbnail -->

        <?php else : ?>

            <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
                <?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
            </a>

        <?php endif; // End is_singular()
    }
endif;

/* Excerpt more  ==================================================================================================== */

if(!function_exists('benko_string_limit_words')){
    function benko_string_limit_words($string, $word_limit)
    {
        $words = explode(' ', $string, ($word_limit + 1));

        if(count($words) > $word_limit) {
            array_pop($words);
        }

        return implode(' ', $words);
    }
}

function benko_excerpt( $class = 'entry-excerpt' ) {
    if ( has_excerpt() || is_search() ) : ?>
        <div class="<?php echo esc_attr( $class ); ?>">
            <?php the_excerpt(); ?>
        </div><!-- .<?php echo esc_attr( $class ); ?> -->
    <?php endif;
}

function benko_excerpt_length() {
    return 18;
}
add_filter('excerpt_length', 'benko_excerpt_length');

function benko_excerpt_more($more) {
    return ' ...';
}
add_filter('excerpt_more', 'benko_excerpt_more');

/* Sub String Content =============================================================================================== */
if(!function_exists('benko_content')) {
    function benko_content($limit) {
        $excerpt = explode(' ', get_the_excerpt(), $limit);
        if (count($excerpt)>=$limit) {
            array_pop($excerpt);
            $excerpt = implode(" ",$excerpt).'...';
        } else {
            $excerpt = implode(" ",$excerpt);
        }
        $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
        return $excerpt;
    }
}

add_filter( 'body_class', 'benko_class' );
function benko_class( $classes ) {
    global  $post;
    //check layout header
    $class_header =get_theme_mod('benko_header', 'simple');
    if(is_page()){
        $class_header=get_post_meta($post->ID, 'layout_header',true);
    }

    if ( $class_header) {
        $classes[] = 'benko-header-'.$class_header;
    }

    return $classes;
}

/* Get Category  ==================================================================================================== */
if(!function_exists('benko_category')) {
    function  benko_category($separator)
    {
        $first_time = 1;
        foreach ((get_the_category()) as $category) {
            $color = get_term_meta( $category->term_id, '_category_color', true );
            $style_css='';
            if($color){
                $background ="color:#$color";
                $style_css  ='style  = '.$background.'';
            }
            if ($first_time == 1) {?>
                <a href="<?php echo esc_url(get_category_link($category->term_id));?>" <?php echo esc_attr($style_css);?>  title="<?php printf( esc_attr__('View all posts in %s', 'benko'), $category->name); ?>" >
                    <?php echo esc_attr($category->name);?>
                </a>
                <?php $first_time = 0; ?>
            <?php } else {
                echo esc_attr($separator) ?>
                <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" <?php echo esc_attr($style_css);?> title="<?php printf( esc_attr__('View all posts in %s', 'benko'), $category->name) ?>" >
                    <?php  echo esc_attr($category->name); ?>
                </a>
            <?php }
        }
    }
}

/* Config Sidebar archive =========================================================================================== */
add_action( 'archive-sidebar-left', 'benko_cat_sidebar_left' );
function benko_cat_sidebar_left() {
    $cat_sidebar=get_theme_mod( 'benko_sidebar_cat', 'right' );
    if(isset($_GET['layout'])){
        $cat_sidebar=$_GET['layout'];
    }
    if ( $cat_sidebar && $cat_sidebar == 'left' && is_active_sidebar( 'archive' )) {?>
         <div id="archive-sidebar" class="sidebar sidebar-left col-sx-12 col-sm-12 col-md-3 col-lg-3 archive-sidebar">
            <?php get_sidebar('sidebar'); ?>
        </div>
    <?php }
}
add_action( 'archive-sidebar-right', 'benko_cat_sidebar_right' );
function benko_cat_sidebar_right() {
    $cat_sidebar=get_theme_mod( 'benko_sidebar_cat', 'right' );
    if(isset($_GET['layout'])){
        $cat_sidebar=$_GET['layout'];
    }
    if ( $cat_sidebar && $cat_sidebar == 'right' && is_active_sidebar( 'archive' )) {?>
         <div id="archive-sidebar" class="sidebar sidebar-right  col-sx-12 col-sm-12 col-md-3 col-lg-3 archive-sidebar">
            <?php get_sidebar('sidebar'); ?>
        </div>
    <?php }
}
//content
add_action( 'archive-content-before', 'benko_cat_content_before' );
function benko_cat_content_before() {
    $cat_sidebar=get_theme_mod( 'benko_sidebar_cat', 'right' );
    if(isset($_GET['layout'])){
        $cat_sidebar=$_GET['layout'];
    }
    if ( $cat_sidebar && is_active_sidebar( 'archive' ) && $cat_sidebar != 'full') {?>
         <div class="main-content content-<?php echo esc_html($cat_sidebar)?> col-sx-12 col-sm-12 col-md-9 col-lg-9">
    <?php }
    else{?>
        <div class="main-content col-md-12 col-lg-12">
    <?php }
}
add_action( 'archive-content-after', 'benko_cat_content_after' );
function benko_cat_content_after() {
    $cat_sidebar=get_theme_mod( 'benko_sidebar_cat', 'right' );
    if ( $cat_sidebar){?>
        </div>
    <?php }
}


/* Comment Form ===================================================================================================== */
function benko_comment_form($arg,$class='btn-variant',$id='submit'){
    ob_start();
    comment_form($arg);
    $form = ob_get_clean();
    echo str_replace('id="submit"','id="'.$id.'"', $form);
}

function benko_list_comments($comment, $args, $depth){
    $path = get_template_directory() . '/templates/list_comments.php';
    if( is_file($path) ) require ($path);
}

/* Ajax Feature Post =================================================================================================*/
add_action('wp_ajax_feature_post', 'benko_feature_post');
add_action('wp_ajax_nopriv_feature_post', 'benko_feature_post');
function benko_feature_post() {
    if (check_admin_referer( 'benko-feature-post' ) ) {
        $post_id = absint( $_GET['post_id'] );
        if ( 'post' === get_post_type( $post_id ) ) {
            update_post_meta( $post_id, '_featured', get_post_meta( $post_id, '_featured', true ) === 'yes' ? 'no' : 'yes' );
            delete_transient( 'benko_featured_post' );
        }
    }
    wp_safe_redirect( wp_get_referer() ? remove_query_arg( array( 'trashed', 'untrashed', 'deleted', 'ids' ), wp_get_referer() ) : admin_url( 'edit.php' ) );
    die();
    }

    // add featured thumbnail to admin post columns
    function benko_add_thumbnail_columns( $columns ) {
        $columns['post_featured'] = esc_html__('Featured', 'benko');
        return $columns;
    }
    function benko_is_featured() {
        $featured =get_post_meta( get_the_ID(), '_featured', true );
        return $featured === 'yes' ? true : false;
    }
    function benko_add_thumbnail_columns_data( $column_name, $post_id) {
        if ($column_name === 'post_featured') {
        $url = wp_nonce_url( admin_url( 'admin-ajax.php?action=feature_post&post_id=' . get_the_ID() ), 'benko-feature-post' );
        echo '<a href="' . esc_url( $url ) . '" title="'.  esc_attr__( 'Toggle featured', 'benko' ) . '">';
            if (benko_is_featured()) {
            echo '<span class="benko-featured tips" data-tip="' . esc_attr__( 'Yes', 'benko' ) . '"><span class="dashicons dashicons-star-filled"></span> </span>';
            } else {
            echo '<span class="benko-featured not-featured tips" data-tip="' . esc_attr__( 'No', 'benko' ) . '"><span class="dashicons dashicons-star-empty"></span></span>';
            }
            echo '</a>';
        }
    }

    if ( function_exists( 'add_theme_support' ) ) {
    add_filter( 'manage_posts_columns' , 'benko_add_thumbnail_columns' );
    add_action( 'manage_posts_custom_column' , 'benko_add_thumbnail_columns_data', 10, 2 );
}
function benko_zoom_image() {?>
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" title="<?php echo  esc_attr__('Close (Esc)','benko'); ?>"></button>

                <button class="pswp__button pswp__button--share" title="<?php echo esc_attr__('Share','benko'); ?>"></button>

                <button class="pswp__button pswp__button--fs" title="<?php echo esc_attr__('Toggle fullscreen','benko'); ?>"></button>

                <button class="pswp__button pswp__button--zoom" title="<?php echo esc_attr__('Zoom in/out','benko'); ?>"></button>

                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="<?php echo esc_attr__('Previous (arrow left)','benko');?>">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="<?php echo esc_attr__('Next (arrow right)','benko');?>">
            </button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>
        </div>

    </div>

</div>
<?php }

/* Move comment field to bottom ======================================================================================*/
function benko_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter( 'comment_form_fields', 'benko_move_comment_field_to_bottom' );
?>
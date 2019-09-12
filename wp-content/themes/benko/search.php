<?php
/**
 * The template for displaying search results pages.
 *
 * @author      NanoAgency
 * @link        http://nanoagency.co
 * @copyright   Copyright (c) 2015 NanoAgency
 * @license     GPL v2
 */

get_header();

$layout_content         = get_theme_mod('benko_layout_cat_content', 'grid-large');
if ($layout_content == 'list'){
    $class='col-md-12';
}elseif(is_active_sidebar( 'archive' )){
    $class='col-md-6 col-sm-6 col-xs-12';
}else{
    $class='col-md-4 col-sm-6 col-xs-12';
}
$style_css                  ="";
$bg_header                  = get_theme_mod('benko_cat_image');
$bg_header_color            = get_theme_mod('benko_cat_bg');
if($bg_header){
    $cat_header           ="background-image:url('$bg_header')";
    $style_css            ='style = '.$cat_header.'';
}
if($bg_header_color){
    $cat_header           ="background:$bg_header_color";
    $style_css            ='style = '.$cat_header.'';
}
?>

<?php if ( have_posts() ) { ?>
    <div class="cat-header clearfix" <?php echo esc_attr($style_css);?>>
        <div class="container">
            <header class="title-cat">
                <?php printf( esc_html__( 'Search Results for: %s', 'benko' ), get_search_query() ); ?>
            </header>
        </div>
    </div>
    <div class="container wrap-content-inner">
        <div class="row">
            <?php do_action('archive-sidebar-left'); ?>
            <?php do_action('archive-content-before'); ?>

                <div class="archive-blog row cats-grid clearfix">
                    <div class="affect-isotope">
                        <?php
                        // Start the Loop.
                        while ( have_posts() ) : the_post();
                            ?>
                            <div class="item-post col-item  <?php echo esc_attr($class);?>">
                                <?php get_template_part( 'templates/layout/content' ,$layout_content); ?>
                            </div>
                        <?php
                        endwhile; ?>
                    </div>
                </div>
            <?php
            the_posts_pagination( array(
                'prev_text'          => '<i class="fa fa-angle-left"></i>',
                'next_text'          => '<i class="fa fa-angle-right"></i>',
                'before_page_number' => '<span class="meta-nav screen-reader-text"></span>',
            ) );
            ?>
            <?php do_action('archive-content-after'); ?>

            <?php do_action('archive-sidebar-right'); ?>

        </div><!-- .content-area -->
    </div>
<?php }
else{ ?>
<div class="container">
    <div class="row">
        <div class="main-content col-sm-12 col-md-12 col-lg-12 ">
            <?php
                // If no content, include the "No posts found" template.
                get_template_part( 'content', 'none' );
            ?>
        </div>
    </div><!-- .content-area -->
</div>
<?php } ?>
<?php get_footer(); ?>

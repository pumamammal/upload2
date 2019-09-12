<?php
/**
 * The template for displaying Category pages
 *
 * @author      NanoAgency
 * @link        http://nanoagency.co
 * @copyright   Copyright (c) 2015 NanoAgency
 * @license     GPL v2
 */

get_header();

$title                  = get_theme_mod('benko_post_title_heading',true);
$layout_content         = get_theme_mod('benko_layout_cat_content', 'grid-large');
$cat_sidebar            = get_theme_mod( 'benko_sidebar_cat', 'right' );

if(isset($_GET['layout'])){
    $cat_sidebar=$_GET['layout'];
}

if ($layout_content == 'list'){
    $class='col-md-12';
}elseif($cat_sidebar && is_active_sidebar( 'archive' ) && $cat_sidebar != 'full'){
    $class='col-md-6 col-sm-6 col-xs-12';
}else{
    $class='col-md-4 col-sm-6 col-xs-12';
}

//get
if(isset($_GET['col'])){
    $class=$_GET['col'];
}
if(isset($_GET['content'])){
    $layout_content=$_GET['content'];
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
<div class="wrap-content" role="main">
    <?php if ($title): ?>
        <div class="cat-header clearfix" <?php echo esc_attr($style_css);?>>
            <div class="container">
                <header class="title-cat">
                    <?php single_cat_title(); ?>
                </header>
                <!-- .entry-header -->
                <?php  the_archive_description( '<div class="cat-description">', '</div>' );?>
            </div>
        </div>
    <?php endif;?>
    <div class="container wrap-content-inner">
        <div class="row content-category">
        <?php do_action('archive-sidebar-left'); ?>
        <?php do_action('archive-content-before'); ?>
        <?php if ( have_posts() ) : ?>
            <div class="archive-blog row cats-<?php echo esc_attr($layout_content);?>">
                <div class="rows affect-isotope ">
                    <?php
                    // Start the Loop.
                    while ( have_posts() ) : the_post(); ?>
                            <div class="item-post col-item  <?php echo esc_attr($class);?>">
                                <?php get_template_part( 'templates/layout/content' ,$layout_content); ?>
                            </div>
                    <?php  endwhile;
                    else :
                        // If no content, include the "No posts found" template.
                        get_template_part( 'content', 'none' );
                    endif;

                    ?>
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
</div>
<?php
get_footer();

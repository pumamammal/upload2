<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="fluid"
     data-ad-layout-key="-fu+15-5z-dp+1bu"
     data-ad-client="ca-pub-4876469280300711"
     data-ad-slot="4648826644"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
<?php
/**
 * The template for displaying archive pages
 *
 * @author      NanoAgency
 * @link        http://nanoagency.co
 * @copyright   Copyright (c) 2015 NanoAgency
 * @license     GPL v2
 */
get_header();
$layout_content         = get_theme_mod('benko_layout_cat_content', 'grid-large');
$col="col-md-12 col-sm-12";
$class="col-md-4 col-sm-12";
if(is_active_sidebar( 'archive' )){
    $col="col-sm-12 col-md-9 col-lg-9 content-right";
    $class="col-md-6 col-sm-12";
}
?>
<div class="container has-padding-top">
    <div class="row">
        <div class="main-content <?php echo esc_attr($col); ?>" role="main">
            <?php if ( have_posts() ) : ?>
            <div class="archive-blog affect-isotope row cats-grid">
                <?php
                // Start the Loop.
                while ( have_posts() ) : the_post(); ?>
                        <div class="item-post col-item <?php echo esc_attr($class); ?>">
                            <?php get_template_part( 'templates/layout/content' ,$layout_content); ?>
                        </div>
                <?php endwhile;

                else :
                    // If no content, include the "No posts found" template.
                    get_template_part( 'content', 'none' );

                endif;
                the_posts_pagination( array(
                    'prev_text'          => '<i class="fa fa-angle-left"></i>',
                    'next_text'          => '<i class="fa fa-angle-right"></i>',
                    'before_page_number' => '<span class="meta-nav screen-reader-text"></span>',

                ) );
                ?>
            </div>

        </div><!-- .site-main -->
        <?php if(is_active_sidebar( 'archive' )){?>
        <div id="archive-sidebar" class="sidebar sidebar-right  hidden-sx hidden-sm col-sx-12 col-sm-12 col-md-3 col-lg-3 archive-sidebar">
            <div class="content-inner">
                <?php dynamic_sidebar( 'archive' ); ?>
            </div>
        </div>
        <?php }?>
    </div><!-- .content-area -->
</div>
<?php get_footer(); ?>

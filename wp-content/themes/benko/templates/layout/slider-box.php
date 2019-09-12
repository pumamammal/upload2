<?php
/**
 * The default template for displaying content
 *
 * @author      Nanobenko
 * @link        http://nanobenko.co
 * @copyright   Copyright (c) 2015 Nanobenko
 * @license     GPL v2
 */
$format = get_post_format();
$add_class='';
$comments = get_theme_mod('benko_post_cat_meta_comment', true);
$view = get_theme_mod('benko_post_meta_view', true);
$share = get_theme_mod('benko_post_meta_share', false);
$placeholder_image = get_template_directory_uri(). '/assets/images/placeholder-box.png';
?>

<article <?php post_class('post-item post-tran clearfix '); ?>>
    <?php if(has_post_thumbnail()) : ?>
        <?php if(!get_theme_mod('sp_post_thumb')) :
            $bg_image= wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), "full" );
            $background_image="background-image:url('$placeholder_image')";
            $style_css      ='style = '.$background_image.'';
            ?>
            <div class="article-image ">
                <span class="bgr-item"></span>
                <div class="post-image lazy single-bgr-image" <?php echo esc_attr($style_css);?> data-src="<?php echo esc_url($bg_image[0]);?>">
                </div>
            </div>
            <div class="article-content">
                <div class="entry-header clearfix">
                    <header class="entry-header-title">
                        <?php
                        the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
                        ?>
                    </header>
                    <a class="btn-read btn-white" href="<?php echo get_permalink() ?>"><?php esc_html_e('Read more','benko'); ?></a>

                </div>
            </div>
        <?php endif; ?>
    <?php else : ?>
        <div class="post-image  placeholder-trans ">
            <a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail('benko-blog-tran'); ?>
                <img src="<?php echo esc_url($placeholder_image); ?>" class="wp-post-image" width="1170" height="500">
            </a>
        </div>
    <?php endif; ?>
</article><!-- #post-## -->
<!--<a href="--><?php //echo esc_url(comments_link());?><!--" class="text-comment">-->
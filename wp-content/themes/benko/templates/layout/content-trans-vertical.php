<?php
/**
 * The default template for displaying content
 *
 * @author      NanoAgency
 * @link        http://nanoagency.co
 * @copyright   Copyright (c) 2015 NanoAgency
 * @license     GPL v2
 */

$format = get_post_format();
$add_class='';
$placeholder_image = get_template_directory_uri(). '/assets/images/layzyload-trans-vertical.jpg';
?>

<article <?php post_class('post-item post-tran clearfix'); ?>>
    <div class="article-image">
            <?php if(has_post_thumbnail()) : ?>
                <?php if(!get_theme_mod('sp_post_thumb')) : ?>
                    <?php $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), "benko-blog-trans-vertical" ); ?>
                    <div class="post-image">
                        <a href=" <?php echo get_permalink() ?>">
                            <img  class="lazy" src="<?php echo esc_url($placeholder_image);?>"  data-original="<?php echo esc_attr($thumbnail_src[0]);?>" data-src="<?php echo esc_attr($thumbnail_src[0]);?>" alt="<?php echo esc_attr__('single image','benko'); ?>"/>
                        </a>
                    </div>
                <?php endif; ?>
            <?php else :
                $add_class='full-width';
                $placeholder_image = get_template_directory_uri(). '/assets/images/layzyload-trans-vertical.jpg';
                ?>
                <div class="post-image  <?php echo esc_attr($add_class);?>">
                    <a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail('benko-blog-trans-vertical'); ?>
                        <img src="<?php echo esc_url($placeholder_image); ?>" class="wp-post-image" width="1170" height="500">
                    </a>
                </div>
            <?php endif; ?>
    </div>
    <span class="bgr-item"></span>
    <div class="article-content <?php echo esc_attr($add_class);?>">
        <div class="article-content-inner">
            <div class="entry-header clearfix">
                <header class="entry-header-title">
                    <?php
                        the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
                    ?>
                    <span class="post-cat"><?php echo benko_category(' '); ?></span>
                    <div class="article-meta clearfix">
                        <?php benko_entry_meta(); ?>
                    </div>
                </header>
            </div>
        </div>
    </div>
</article><!-- #post-## -->

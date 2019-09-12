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
$placeholder_image = get_template_directory_uri(). '/assets/images/placeholder-trans.png';
$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), "full" );
$bg_image="background-image:url('$placeholder_image')";
?>

<article <?php post_class('post-item post-tran  clearfix'); ?>>
    <div class="article-tran hover-share-item">
        <?php if(has_post_thumbnail()) : ?>
            <?php if(!get_theme_mod('sp_post_thumb')) : ?>
                <?php if(has_post_thumbnail()) : ?>
                    <div class="post-image lazy"
                         style = "<?php echo esc_attr($bg_image);?>"
                         data-src="<?php echo esc_url($thumbnail_src[0]);?>" >
                        <a href="<?php echo get_permalink() ?>"></a>
                    </div>
                    <span class="bg-rgb"></span>
                <?php endif;?>
                <div class="article-content">
                    <div class="entry-header clearfix">
                        <span class="post-cat"><?php echo benko_category(' '); ?></span>
                        <header class="entry-header-title">
                            <?php
                            the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
                            ?>
                        </header>
                        <div class="article-footer clearfix">
                            <div class="article-meta">
                                <?php benko_entry_meta(); ?>
                            </div>
                        </div>

                    </div>
                </div>
            <?php endif; ?>
        <?php else : ?>
            <div class="post-image  placeholder-trans ">
                <a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail('buggy-blog-tran'); ?>
                    <img src="<?php echo esc_url($placeholder_image); ?>" class="wp-post-image" width="1170" height="500">
                </a>
            </div>
        <?php endif; ?>
    </div>

</article>

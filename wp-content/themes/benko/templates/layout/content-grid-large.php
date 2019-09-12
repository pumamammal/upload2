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
$placeholder_image = get_template_directory_uri(). '/assets/images/layzyload-grid-large.jpg';
$share = get_theme_mod('benko_post_meta_share', false);
?>

<article <?php post_class('post-item post-grid post-grid-large clearfix'); ?>>
    <div class="article-tran hover-share-item">
        <?php if(has_post_thumbnail()) : ?>
            <?php if(!get_theme_mod('sp_post_thumb')) : ?>
                <?php if(has_post_thumbnail()) : ?>
                    <?php $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), "benko-blog-grid" ); ?>
                    <div class="post-image">
                        <a href="<?php echo get_permalink() ?>" class="bgr-item"></a>
                        <a href=" <?php echo get_permalink() ?>">
                            <img  class="lazy" src="<?php echo esc_url($placeholder_image);?>"  data-lazy="<?php echo esc_attr($thumbnail_src[0]);?>" data-src="<?php echo esc_attr($thumbnail_src[0]);?>" alt="<?php echo esc_attr__('single image','benko'); ?>"/>
                        </a>
                    </div>

                <?php endif;?>
                <div class="article-content">
                    <div class="entry-header clearfix">
                        <span class="post-cat"><?php echo benko_category(' '); ?></span>
                        <header class="entry-header-title">
                            <?php
                            the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
                            ?>
                        </header>

                        <div class="entry-content">
                            <?php
                            if ( has_excerpt() || is_search() ){
                                benko_excerpt();
                            }
                            else{
                                echo benko_content(18);
                            }
                            ?>
                        </div>

                        <div class="article-footer clearfix">
                            <div class="article-meta">
                                <?php benko_entry_meta(); ?>
                            </div>
                            <?php benko_entry_meta_left(); ?>
                        </div>
                    </div>

                </div>
            <?php endif; ?>
        <?php else :
            $placeholder_image = get_template_directory_uri(). '/assets/images/layzyload-tran.jpg';
            ?>
            <div class="post-image  placeholder-trans">
                <?php
                if ($share) { ?>
                    <?php get_template_part('templates/share');
                }
                ?>
            </div>
            <div class="article-content no-thumb">
                <span class="post-cat"><?php echo benko_category(' '); ?></span>
                <div class="entry-header clearfix">
                    <header class="entry-header-title">
                        <?php
                        the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
                        ?>
                    </header>
                </div>

                <div class="entry-content">
                    <?php
                    if ( has_excerpt() || is_search() ){
                        benko_excerpt();
                    }
                    else{
                        echo benko_content(25);
                    }
                    ?>
                </div>
                <div class="article-footer clearfix">
                    <div class="article-meta">
                        <?php benko_entry_meta(); ?>
                    </div>
                    <?php benko_entry_meta_left(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

</article><!-- #post-## -->

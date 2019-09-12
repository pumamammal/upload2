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
$format = get_post_format();
$add_class='';
$limit=18;

//number word content
$placeholder_image = get_template_directory_uri(). '/assets/images/layzyload-list.jpg';

?>
<article  <?php post_class('post-item post-list clearfix'); ?>>
    <div class="article-image">
        <?php if(has_post_thumbnail()) : ?>
            <?php $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), "benko-blog-list" ); ?>
            <div class="post-image">
                <span class="bgr-item"></span>
                <a href="<?php echo get_permalink();?>">
                    <img  class="lazy" src="<?php echo esc_url($placeholder_image);?>"  data-src="<?php echo esc_attr($thumbnail_src[0]);?>" alt="<?php echo esc_attr__('single image','benko'); ?>"/>
                </a>
            </div>
            <?php if(has_post_format('gallery')) : ?>
                <?php $images = get_post_meta( get_the_ID(), '_format_gallery_images', true );?>
                <?php if($images) : ?>
                    <div class="post-gallery">
                        <a  href="<?php echo get_post_format_link( $format ); ?>" class="post-format"><i class="ti-camera"></i></a>
                    </div>
                <?php endif; ?>

            <?php elseif(has_post_format('video')) : ?>
                <div class="post-video">
                    <a  href="<?php echo get_post_format_link( $format ); ?>" class="post-format"><i class="fa fa-play"></i></a>
                </div>
            <?php elseif(has_post_format('audio')) : ?>
                <div class="post-audio">
                    <a  href="<?php echo get_post_format_link( $format ); ?>" class="post-format"><i class="ti-headphone"></i></a>
                </div>
            <?php elseif(has_post_format('quote')) :?>
                <div class="post-quote <?php echo esc_attr($add_class);?>">
                    <?php $sp_quote = get_post_meta( get_the_ID(), '_format_quote_source_name', true ); ?>
                    <a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail('benko-blog-list'); ?></a>
                    <a  href="<?php echo get_post_format_link( $format ); ?>" class="post-format"><i class="ti-quote-left"></i></a>
                </div>
            <?php endif; ?>
        <?php else :
            $add_class='full-width';
            $limit=35;
        endif; ?>

    </div>
    <div class="article-content <?php echo esc_attr($add_class);?>">
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
                echo benko_content($limit);
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
</article><!-- #post-## -->

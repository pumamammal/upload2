<?php
/**
 * Single Post
 *
 * @author      NanoAgency
 * @link        http://nanoagency.co
 * @copyright   Copyright (c) 2015 NanoAgency
 * @license     GPL v2
 */
?>

<?php
$feature_image      = get_theme_mod('benko_feature_image',true);
$ads_single_right   = get_theme_mod('benko_ads_single_article',false);
$singletop          = get_theme_mod('benko_single_top_off');
$add_class ='';
$ads=get_theme_mod('benko_ads_single_top');
if(isset($_GET['ads'])){
    $ads=$_GET['ads'];
}
?>

<div class="single-2" role="main">

    <div class="container">
        <div class="row single-main-content ">
            <div class="main-content content-full col-sx-12 col-sm-12 col-md-12 col-lg-12">

                <div class="content-inner">
                    <?php
                    // Start the loop.
                        while ( have_posts() ) : the_post(); ?>

                        <div class="box-article">
                            <article id="post-<?php the_ID(); ?>" <?php  post_class();?>>

                                <?php  if($feature_image){ ?>
                                    <?php if(has_post_format('gallery')) : ?>
                                        <?php $images = get_post_meta( $post->ID, '_format_gallery_images', true ); ?>
                                        <?php if($images) : ?>
                                            <div class="post-image single-image">
                                                <ul class="owl-single">
                                                    <?php foreach($images as $image) : ?>
                                                        <?php $the_image = wp_get_attachment_image_src( $image, 'benko-single-full' ); ?>
                                                        <?php $the_caption = get_post_field('post_excerpt', $image); ?>
                                                        <li><img src="<?php echo esc_url($the_image[0]); ?>" <?php if($the_caption) : ?>title="<?php echo esc_attr($the_caption); ?>"<?php endif; ?> /></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        <?php endif; ?>

                                    <?php elseif(has_post_format('video')) : ?>

                                        <div class="embed-responsive single-image embed-responsive-16by9 post-video single-video embed-responsive embed-responsive-16by9">
                                            <?php $sp_video = get_post_meta( get_the_ID(), '_format_video_embed', true ); ?>
                                            <?php if(wp_oembed_get( $sp_video )) : ?>
                                                <?php echo wp_oembed_get($sp_video); ?>
                                            <?php else : ?>
                                                <?php echo esc_url($sp_video); ?>
                                            <?php endif; ?>
                                        </div>

                                    <?php elseif(has_post_format('audio') ) : ?>

                                        <div class="post-image audio single-image single-audio">
                                            <?php $sp_audio = get_post_meta( $post->ID, '_format_audio_embed', true ); ?>
                                            <?php if(wp_oembed_get( $sp_audio )) : ?>
                                                <?php echo wp_oembed_get($sp_audio); ?>
                                            <?php else : ?>
                                                <?php echo str_replace('','', $sp_audio); ?>
                                            <?php endif; ?>
                                        </div>

                                    <?php else : ?>
                                        <?php if(has_post_thumbnail() ) { ?>
                                            <?php if(!get_theme_mod('sp_post_thumb')) : ?>
                                                <div class="post-image single-image">
                                                    <?php $thumbnail_full = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), "full" ); ?>
                                                    <?php $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), "benko-single-full" ); ?>
                                                    <figure class="wp-single-image">
                                                        <a href="<?php echo esc_attr($thumbnail_full[0]);?>" data-size="<?php echo esc_attr($thumbnail_full[1]); ?>x<?php echo esc_attr($thumbnail_full[2]); ?>">
                                                            <img  class="wp-post-image" src="<?php echo esc_attr($thumbnail_src[0]);?>" alt="<?php echo esc_attr__('single image','benko'); ?>"/>
                                                        </a>
                                                    </figure>
                                                </div>
                                            <?php endif; ?>
                                        <?php }else{
                                            $add_class='no-thumbnail';
                                        } ?>
                                    <?php endif;
                                }?>

                                <div class="entry-header entry-header-single clearfix">
                                    <span class="post-cat clearfix"><?php echo benko_category(' '); ?></span>
                                    <header class="entry-header-title clearfix">
                                        <?php  the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                                    </header>
                                    <div class="single_author clearfix">

                                        <?php if(get_theme_mod('benko_avatar_meta',true)):?>
                                            <div class="entry-avatar clearfix">
                                                <?php
                                                $author_bio_avatar_size = apply_filters( 'benko_author_bio_avatar_size', 50 );
                                                echo  get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
                                                ?>
                                                <div class="header-meta">
                                                    <div class="avatar-meta">
                                                                <span class="author-title">
                                                                    <a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
                                                                        <?php echo esc_attr(get_the_author()); ?>
                                                                    </a>
                                                                </span>
                                                    </div>
                                                    <div class="article-meta clearfix">
                                                        <?php benko_entry_meta(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif;?>
                                    </div>
                                    <?php benko_excerpt(); ?>
                                </div>
                                <div class="entry-content <?php echo esc_attr($add_class);?> clearfix">

                                    <?php
                                    //ads
                                    if($ads_single_right) {?>
                                        <div class="ads_content_single ads-before-content">
                                            <?php echo wp_kses_post(get_theme_mod('benko_ads_rectangle'));?>
                                        </div>
                                    <?php }?>

                                    <?php
                                    the_content();
                                    wp_link_pages( array(
                                        'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'benko' ) . '</span>',
                                        'after'       => '</div>',
                                        'link_before' => '<span class="page-numbers">',
                                        'link_after'  => '</span>',
                                        'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'benko' ) . ' </span>%',
                                        'separator'   => '<span class="screen-reader-text">, </span>',
                                    ) );
                                    ?>
                                </div>
                                <?php
                                //ads
                                if(get_theme_mod('benko_ads_after_content')) {?>
                                    <div class="advertising_after_content clearfix">
                                        <?php echo  wp_kses_post(get_theme_mod('benko_ads_leaderboard'));?>
                                    </div>
                                <?php }?>
                                <div class="entry-footer <?php echo esc_attr($add_class);?> clearfix">
                                    <div class="entry-footer-social clearfix">
                                        <?php get_template_part('templates/tag'); ?>
                                        <?php get_template_part('templates/share-social'); ?>
                                    </div>
                                </div>

                            </article>
                        </div>
                        <?php  get_template_part( 'content','single' );
                    endwhile;
                    // End the loop.
                    ?>
                </div>

             </div>
        </div>
    </div>

</div>

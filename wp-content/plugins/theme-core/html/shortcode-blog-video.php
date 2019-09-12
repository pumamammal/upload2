<?php
/**
 * The default template for displaying content
 *
 * @author      NanoAgency
 * @link        http://nanoagency.co
 * @copyright   Copyright (c) 2015 NanoAgency
 * @license     GPL v2
 */
$add_rtl="false";
if(is_rtl()){
    $add_rtl="true";
}
$format = get_post_format();
$add_class=$class='';
$args = array(
    'category_name'  => $atts['category_name'],
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => $atts['number_post'],
    'tax_query' => array(
        array(
            'taxonomy' => 'post_format',
            'field' => 'slug',
            'terms' => array( 'post-format-video' )
        )
    )
);
$auto='0';
if($atts['auto_play']=='yes'){
    $auto='1';
}
switch ($atts['show_post']) {
    case '1':
        $class .= "col-md-12 col-xs-12";
        break;
    case '2':
        $class .= "col-xs-12 col-sm-6 col-md-6";
        break;
    case '3':
        $class .= "col-xs-12 col-sm-6 col-md-4";
        break;
    case '4':
        $class .= "col-xs-12 col-sm-6 col-md-3";
        break;
    default:
        $class .= "col-xs-12 col-sm-6 col-md-4";
        break;
}

$the_query = new WP_Query($args);
$count  = $the_query->post_count;
$cats   =  explode(",", $atts['category_name']);
?>

<div class="box-videos clearfix">
    <?php if ($atts['title']) { ?>
        <div class="box-title <?php echo esc_attr($atts['title_style']);?> clearfix">
            <h2 class="title-left "><?php echo esc_html($atts['title']); ?></h2>
            <div class="title-right">
                <a  href="<?php echo esc_url( home_url( '/type/video/' ) ); ?>"><?php esc_html_e('View all','nano')?><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            </div>
        </div>
    <?php } ?>

    <?php switch ($atts['layout_types']) {
        case 'large':?>
            <div class="box-video video-vertical rows clearfix">
                <div class="col-md-9 col-sm-12 slider-video equal-content">
                    <?php $k=1;
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post();
                        if(has_post_format('video')) {?>
                            <?php $sp_video = get_post_meta( get_the_ID(), '_format_video_embed', true );
                            $placeholder_image = get_template_directory_uri(). '/assets/images/layzyload-video-image.jpg';
                            $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), "benko-video-image" );
                            ?>
                            <div class="post-item video-<?php echo esc_attr(get_the_ID());?> <?php echo $k ;?> <?php if ($k == 1) echo esc_attr('active');?>">
                                <div class="article-video">

                                </div>
                                <div class="article-image">
                                    <?php if(wp_oembed_get( $sp_video )) {?>
                                        <img  class="lazy" src="<?php echo esc_url($placeholder_image);?>" data-src="<?php echo esc_attr($thumbnail_src[0]);?>" alt="post-image"/>
                                        <span class="bgr-item"></span>
                                        <span class="btn-play" data-id="<?php echo esc_attr(get_the_ID());?>">
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                        </span>
                                    <?php } ?>
                                </div>

                            </div>
                        <?php  }  $k++; ?>
                    <?php }
                    wp_reset_postdata();?>
                </div>
                <div class="col-md-3 col-sm-12  slider-nav nano equal-sidebar">
                    <div class="nano-content clearfix">
                        <?php
                        $n=1;
                        while ( $the_query->have_posts() ) {
                            $the_query->the_post();
                            $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), "benko-blog-video-widget" );
                            $placeholder_image = get_template_directory_uri(). '/assets/images/layzyload-video.jpg';
                            ?>
                            <?php if(has_post_format('video')) :?>
                                <div class="post-grid-mini post-item clearfix">
                                    <div class="post-image single-image btn-play <?php if ($n == 1) echo esc_attr('active');?>" data-name="video<?php echo esc_attr($n);?> " data-id="<?php echo esc_attr(get_the_ID());?>">
                                        <div class="post-image-arg">
                                            <img  class="lazy wp-post-image" src="<?php echo esc_url($placeholder_image);?>" data-src="<?php echo esc_attr($thumbnail_src[0]);?>" alt="post-image"/>
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="article-content clearfix">
                                        <header class="entry-header-title">
                                            <?php
                                            the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
                                            ?>
                                        </header>
                                        <div class="article-meta clearfix">
                                            <?php benko_entry_meta(); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php  endif;  $n++;
                        }
                        wp_reset_postdata();?>
                    </div>
                </div>

            </div>
            <?php break;
        case 'list':?>
            <div class="box-video video-horizontal clearfix">
                <div class="col-md-12 slider-video">
                    <?php $k=1;
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post(); ?>
                        <?php if(has_post_format('video')) {?>
                            <?php $sp_video = get_post_meta( get_the_ID(), '_format_video_embed', true );
                            $placeholder_image = get_template_directory_uri(). '/assets/images/layzyload-video-image.jpg';
                            $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), "benko-blog-video" );
                            ?>
                            <div class="post-item video-<?php echo esc_attr(get_the_ID());?> <?php echo $k ;?> <?php if ($k == 1) echo esc_attr('active');?>">
                                <div class="article-video">
                                </div>
                                <div class="article-image">
                                    <?php if(wp_oembed_get( $sp_video )) {?>
                                        <img  class="lazy" src="<?php echo esc_url($placeholder_image);?>" data-src="<?php echo esc_attr($thumbnail_src[0]);?>" alt="post-image"/>
                                        <span class="bgr-item"></span>
                                        <span class="btn-play" data-id="<?php echo esc_attr(get_the_ID());?>">
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                        </span>
                                    <?php } ?>
                                </div>
                                <div class="article-content <?php echo esc_attr($add_class);?>">
                                    <div class="entry-header clearfix">
                                        <header class="entry-header-title">
                                            <?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                                        </header>
                                    </div>
                                    <div class="article-meta clearfix">
                                        <?php benko_entry_meta(); ?>
                                    </div>
                                    <a class="btn-read hidden" href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e('Read More','nano');?></a>
                                </div>
                            </div>
                        <?php  }  $k++; ?>
                    <?php }
                    wp_reset_postdata();?>
                </div>
                <div class="col-md-12 slider-nav">
                    <?php
                    $n=1;
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post();
                        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), "benko-video" );
                        $placeholder_image = get_template_directory_uri(). '/assets/images/layzyload-video.jpg';
                        ?>
                        <?php if(has_post_format('video')) :?>
                            <div class="post-grid-mini post-item clearfix">
                                <div class="post-image single-image btn-play <?php if ($n == 1) echo esc_attr('active');?>" data-name="video<?php echo esc_attr($n);?> " data-id="<?php echo esc_attr(get_the_ID());?>">
                                    <div class="post-image-arg">
                                        <img  class="lazy wp-post-image" src="<?php echo esc_url($placeholder_image);?>" data-src="<?php echo esc_attr($thumbnail_src[0]);?>" alt="post-image"/>
                                        <i class="fa fa-play" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="article-content clearfix">
                                    <header class="entry-header-title">
                                        <?php
                                        the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
                                        ?>
                                    </header>
                                </div>
                            </div>
                        <?php  endif;  $n++;
                    }
                    wp_reset_postdata();?>
                </div>
            </div>
            <?php break;
        case 'carousel':?>
            <div class="box-video video-carousel clearfix">
                <div class="article-carousel archive-blog " data-rtl="<?php echo esc_attr($add_rtl);?>" data-number="<?php echo esc_attr($atts['show_post']);?>"  data-dots="false" data-table="2" data-mobile = "1" data-mobilemin = "1" data-arrows="true">
                    <?php
                    $n=1;
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post(); ?>

                        <?php if(has_post_format('video')) :?>
                            <div class="post-grid post-item clearfix">
                                <div class="post-image <?php if ($n == 1) echo esc_attr('active');?>" data-name="video<?php echo esc_attr($n);?>">
                                    <div class="post-image-arg">
                                        <a href="<?php echo esc_url( get_permalink() );?>">
                                            <?php the_post_thumbnail('benko-blog-video'); ?>
                                        </a>
                                        <span class="bgr-item"></span>
                                        <i class="fa fa-play" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="article-content clearfix">
                                    <div class="entry-header">
                                        <header class="entry-header-title">
                                            <?php
                                            the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
                                            ?>
                                        </header>
                                        <div class="article-meta clearfix">
                                            <?php benko_entry_meta(); ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <?php  endif;  $n++;?>
                    <?php }
                    wp_reset_postdata();?>

                </div>
            </div>
            <?php break;
        case 'grid':?>
            <div class="box-video video-grid layout-grid clearfix">
                <div class="article-grid row">
                    <?php
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post(); ?>
                        <div class="description-hidden archive-blog clearfix <?php echo esc_attr($class);?>">
                            <?php if(has_post_format('video')) :?>
                            <div class="post-grid post-item clearfix">
                                <div class="post-image">
                                    <div class="post-image-arg">
                                        <a href="<?php echo esc_url( get_permalink() );?>">
                                            <?php the_post_thumbnail('benko-blog-video'); ?>
                                        </a>
                                        <span class="bgr-item"></span>
                                        <i class="fa fa-play" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="article-content clearfix">
                                    <div class="entry-header">
                                        <header class="entry-header-title">
                                            <?php
                                            the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
                                            ?>
                                        </header>
                                        <div class="article-meta clearfix">
                                            <?php benko_entry_meta(); ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <?php  endif;?>
                        </div>
                    <?php }
                    wp_reset_postdata();?>

                </div>
            </div>
            <?php break;
        default:?>
            <div class="box-video video-carousel clearfix">
                <div class="article-carousel" data-rtl="<?php echo esc_attr($add_rtl);?>" data-number="<?php echo esc_attr($atts['show_post']);?>"  data-dots="true" data-table="2" data-mobile = "1" data-mobilemin = "1" data-arrows="false">
                    <?php
                    $n=1;
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post(); ?>

                        <?php if(has_post_format('video')) :?>
                            <div class="post-grid post-item clearfix">
                                <div class="post-image <?php if ($n == 1) echo esc_attr('active');?>" data-name="video<?php echo esc_attr($n);?>">
                                    <div class="post-image-arg">
                                        <a href="<?php echo esc_url( get_permalink() );?>">
                                            <?php the_post_thumbnail('benko-blog-grid'); ?>
                                        </a>

                                        <i class="fa fa-play" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="article-content clearfix">
                                    <header class="entry-header-title">
                                        <?php
                                        the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
                                        ?>
                                    </header>
                                    <div class="article-meta clearfix">
                                        <?php benko_entry_meta(); ?>
                                    </div>
                                </div>

                            </div>
                        <?php  endif;  $n++;?>
                    <?php }
                    wp_reset_postdata();?>

                </div>
            </div>
            <?php break;
    } ?>
</div>



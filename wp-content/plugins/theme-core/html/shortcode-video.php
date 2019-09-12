<?php

$css_class          = vc_shortcode_custom_css_class( $atts['css'], ' ' );
wp_enqueue_script( 'videoController' );
?>
<div class="nano-video <?php echo esc_attr($css_class); ?>">
    <div class="video-inner">
        <div class="video-embed">
            <?php if($atts['image']) { ?>
                    <div class="image-embed">
                        <?php echo wp_get_attachment_image($atts['image'], 'full'); ?>
                        <span class="bgr-item"></span>

                        <div class="video-content">
                            <span class="btn-play"> <i class="fa fa-play" aria-hidden="true"></i> </span>
                            <?php if($atts['title']) { ?>
                                <div class="image-content-hover">
                                    <div class="border-mask"></div>
                                    <div class="content">
                                        <?php
                                        $html = '';
                                        if($atts['title']){
                                            $html .= '<h3 class="title-video">'. esc_html($atts['title']) .'</h3>';
                                        }
                                        if($atts['des']){
                                            $html .= '<div class="des-video">'. esc_html($atts['des']) .'</div>';
                                        }
                                        echo $html;
                                        ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
            <?php } ?>

            <?php if($atts['link']){?>
                 <div class="embed-responsive hidden embed-responsive-16by9 video-responsive post-video single-video embed-responsive embed-responsive-16by9">
                     <?php $sp_video = $atts['link']; ?>
                     <?php if(wp_oembed_get( $sp_video )) { ?>
                         <?php  echo benko_oembed_get($sp_video, 0,'nano-video'); ?>
                     <?php } ?>
                </div>
            <?php }?>
        </div>

    </div>
</div>

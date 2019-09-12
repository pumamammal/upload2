<?php

$css_class          = vc_shortcode_custom_css_class( $atts['css'], ' ' );
$items              = (array) vc_param_group_parse_atts($atts['items']);
?>
<div class="block nano-infoTeams <?php echo esc_attr($css_class); ?> clearfix">
        <?php if ( $atts['title'] ) {?>
            <h3 class="block-title clearfix">
                <?php echo htmlspecialchars_decode( $atts['title'] ); ?>
            </h3>
            <div class="block-des">
                <?php echo esc_html( $atts['des'] ); ?>
            </div>
        <?php }?>
        <div class="block-content clearfix">
            <?php foreach ( $items as $item ) {?>
                <?php $img_size         = wpb_getImageBySize( array( 'attach_id' => (int) $item['image_box'], 'thumb_size' => '330x260' ) );
                ?>
                <div class="box-team-list">
                    <div class="box-image clearfix">
                        <?php if($item['image_box']) { ?>
                            <div class="image">
                                <?php echo $img_size['thumbnail'];?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="box-content clearfix">
                    <?php if ( $item['title_box'] ) {?>
                        <h5 class="title-box">
                            <?php echo esc_html( $item['title_box'] ); ?>
                        </h5>
                    <?php }?>
                    <?php if ( $item['content_box'] ) {?>
                        <div class="des-box">
                                <?php echo esc_html( $item['content_box'] ); ?>
                        </div>
                    <?php }?>
                    <div class="content-box clearfix">
                        <ul class="list-social">
                            <?php
                            if ( isset($item['link1']) ) {?>
                               <li>
                                    <a class="" href="<?php echo esc_url($item['link1']);?>">
                                        <i class="<?php echo esc_attr( $item['icon1'] ) ;?>"></i>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if ( isset($item['link2'] )) {?>
                                <li>
                                    <a class="" href="<?php echo esc_url($item['link2']);?>">
                                        <i class="<?php echo esc_attr( $item['icon2'] ) ;?>"></i>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if ( isset($item['link3'] )) {?>
                                <li>
                                    <a class="" href="<?php echo esc_url($item['link3']);?>">
                                        <i class="<?php echo esc_attr( $item['icon3'] ) ;?>"></i>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if ( isset($item['link4'] )) {?>
                                <li>
                                    <a class="" href="<?php echo esc_url($item['link4']);?>">
                                        <i class="<?php echo esc_attr( $item['icon4'] ) ;?>"></i>
                                    </a>
                                </li>
                            <?php }
                            ?>
                        </ul>
                    </div>
                </div>
                </div>
            <?php }?>
        </div>
</div>

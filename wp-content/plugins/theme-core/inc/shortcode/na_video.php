<?php

if (!function_exists('na_shortcode_video')) {
    function na_shortcode_video($atts,$output)
    {
        $atts = shortcode_atts(
            array(
                'image' => '',
                'link' => 'http://',
                'title' => 'Stunning || Fashion',
                'des' => 'This is description for Banner',
                'animation' => '',
                'css' => '',

            ), $atts);

        ob_start();
            nano_template_part('shortcode', 'video' , array('atts' => $atts));?>
            <?php
            $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }
}

add_shortcode('na_video', 'na_shortcode_video');

add_action('vc_before_init', 'na_video_integrate_vc');

if (!function_exists('na_video_integrate_vc')) {
    function na_video_integrate_vc()
    {
        vc_map(
            array(
                'name' => esc_html__('NA: Videos', 'nano'),
                'base' => 'na_video',
                'icon' => 'icon-wpb-film-youtube',
                'category' => esc_html__('NA', 'nano'),
                'description' => esc_html__('Show Video', 'nano'),
                'params' => array(
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Image', 'nano'),
                        'value' => '',
                        'param_name' => 'image',
                    ),

                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Link Video', 'nano'),
                        'value' => 'http://',
                        'param_name' => 'link',
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title', 'nano'),
                        'value' => esc_html('Stunning || Fashion'),
                        'param_name' => 'title',
                    ),
                    array(
                        'type' => 'textarea_html',
                        'heading' => esc_html__('Description', 'nano'),
                        'value' => esc_html('This is description for Banner'),
                        'param_name' => 'des',
                    ),
                    array(
                        'type' => 'animation_style',
                        'heading' => __( 'Animation Text Block', 'nano' ),
                        'param_name' => 'animation',
                        'description' => __( 'Choose your animation style', 'nano' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Position Group',
                    ),
                    array(
                        'type' => 'css_editor',
                        'heading' => __( 'Css', 'nano' ),
                        'param_name' => 'css',
                        'group' => __( 'Design options', 'nano' ),
                    ),

                )
            )
        );
    }
}
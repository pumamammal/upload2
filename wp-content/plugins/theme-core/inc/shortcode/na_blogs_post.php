<?php
if (!function_exists('nano_shortcode_post_blog')) {
    function nano_shortcode_post_blog($atts)
    {
        $atts = shortcode_atts(array(
            'ids'         => '',
            'number_post'=> 8,
            'el_class'      => ''
        ), $atts);
        ob_start();
        nano_template_part('shortcode', 'blog-post', array('atts' => $atts));
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
add_shortcode('post_blog', 'nano_shortcode_post_blog');

add_action('vc_before_init', 'nano_post_blog_integrate_vc');

if (!function_exists('nano_post_blog_integrate_vc')) {
    function nano_post_blog_integrate_vc()
    {
        vc_map(array(
            'name' => __('NA Special Posts', 'nano'),
            'base' => 'post_blog',
            'category' => __('NA', 'nano'),
            'icon' => 'vc_icon-vc-hoverbox',
            "params" => array(
                array(
                    "type" => "textfield",
                    "heading" => __("List IDs", 'nano'),
                    "param_name" => "ids",
                    "admin_label" => true
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Extra class name', 'nano' ),
                    'param_name' => 'el_class',
                    'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'nano' )
                )
            )
        ));
    }
}

<?php
if (!function_exists('na_shortcode_info_teams')) {
    function na_shortcode_info_teams($atts,$output)
    {
        $atts = shortcode_atts(

            array(
                'title' => '',
                'des' => '',
                'css' => '',
                'items' => '',
            ), $atts);

        ob_start();
            nano_template_part('shortcode', 'info-teams' , array('atts' => $atts));?>
            <?php
            $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }
}

add_shortcode('na_info_teams', 'na_shortcode_info_teams');

add_action('vc_before_init', 'na_info_teams_integrate_vc');

if (!function_exists('na_info_teams_integrate_vc')) {
    function na_info_teams_integrate_vc()
    {
        vc_map(
            array(
                'name' => esc_html__('NA: Info Teams', 'nano'),
                'base' => 'na_info_teams',
                'icon' => 'icon-wpb-information-white',
                'category' => esc_html__('NA', 'nano'),
                'description' => esc_html__('Show Block About Teams', 'nano'),
                'params' => array(
                    array(
                        "type" => "textfield",
                        "class" => "",
                        "heading" => esc_html__('Title','nano'),
                        "param_name" => "title",
                        'admin_label' => true,
                    ),
                    array(
                        "type" => "textarea",
                        "class" => "",
                        "heading" => esc_html__('Description','nano'),
                        "param_name" => "des",
                    ),
                    array(
                        'type' => 'param_group',
                        'heading' => esc_html__('Team Settings', 'nano' ),
                        'param_name' => 'items',
                        'params' => array(
                            array(
                                "type" => "attach_image",
                                "description" => esc_html__("upload an image. min size :270x300", 'nano'),
                                "param_name" => "image_box",
                                "value" => '',
                                'heading'	=> esc_html__('Image', 'nano' ),

                            ),
                            array(
                                "type" => "textfield",
                                "class" => "",
                                "heading" => esc_html__('Name','nano'),
                                "param_name" => "title_box",
                                'admin_label' => true,
                            ),

                            array(
                                "type" => "textarea",
                                "class" => "",
                                "heading" => esc_html__('Position','nano'),
                                "param_name" => "content_box",
                            ),
                            array(
                                'type' => 'iconpicker',
                                'heading' => __( 'Icon 1', 'nano' ),
                                'param_name' => 'icon1',
                                'value' => 'fa fa-adjust',
                                'settings' => array(
                                    'emptyIcon' => false,
                                    'iconsPerPage' => 4000,
                                ),
                                'dependency' => array(
                                    'element' => 'type',
                                    'value' => 'fontawesome',
                                ),
                                'description' => esc_html__( 'Select icon from library.', 'nano' ),
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__( 'URL (Link) Social 1', 'nano' ),
                                'param_name' => 'link1',
                                'description' => esc_html__( 'Add link to button (Important: adding link automatically adds button).', 'nano' ),
                            ),
                            array(
                                'type' => 'iconpicker',
                                'heading' => __( 'Icon 2', 'nano' ),
                                'param_name' => 'icon2',
                                'value' => 'fa fa-adjust',
                                'settings' => array(
                                    'emptyIcon' => false,
                                    'iconsPerPage' => 4000,
                                ),
                                'dependency' => array(
                                    'element' => 'type',
                                    'value' => 'fontawesome',
                                ),
                                'description' => esc_html__( 'Select icon from library.', 'nano' ),
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__( 'URL (Link) Social 2', 'nano' ),
                                'param_name' => 'link2',
                                'description' => esc_html__( 'Add link to button (Important: adding link automatically adds button).', 'nano' ),
                            ),
                            array(
                                'type' => 'iconpicker',
                                'heading' => __( 'Icon 3', 'nano' ),
                                'param_name' => 'icon3',
                                'value' => 'fa fa-adjust',
                                'settings' => array(
                                    'emptyIcon' => false,
                                    'iconsPerPage' => 4000,
                                ),
                                'dependency' => array(
                                    'element' => 'type',
                                    'value' => 'fontawesome',
                                ),
                                'description' => esc_html__( 'Select icon from library.', 'nano' ),
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__( 'URL (Link) Social 3', 'nano' ),
                                'param_name' => 'link3',
                                'description' => esc_html__( 'Add link to button (Important: adding link automatically adds button).', 'nano' ),
                            ),
                            array(
                                'type' => 'iconpicker',
                                'heading' => __( 'Icon 4', 'nano' ),
                                'param_name' => 'icon4',
                                'value' => 'fa fa-adjust',
                                'settings' => array(
                                    'emptyIcon' => false,
                                    'iconsPerPage' => 4000,
                                ),
                                'dependency' => array(
                                    'element' => 'type',
                                    'value' => 'fontawesome',
                                ),
                                'description' => esc_html__( 'Select icon from library.', 'nano' ),
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__( 'URL (Link) Social 4', 'nano' ),
                                'param_name' => 'link4',
                                'description' => esc_html__( 'Add link to button (Important: adding link automatically adds button).', 'nano' ),
                            ),


                        ),
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
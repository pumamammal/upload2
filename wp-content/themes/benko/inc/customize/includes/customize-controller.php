<?php
/**
 * @package     NA Core
 * @version     0.1
 * @author      Nanobenko
 * @link        http://nanobenko.co
 * @copyright   Copyright (c) 2015 Nanobenko
 * @license     GPL v2
 */
if (!class_exists('benko_Customize')) {
    class benko_Customize
    {
        public $customizers = array();

        public $panels = array();

        public function init()
        {
            $this->customizer();
            add_action('customize_controls_enqueue_scripts', array($this, 'benko_customizer_script'));
            add_action('customize_register', array($this, 'benko_register_theme_customizer'));
            add_action('customize_register', array($this, 'benko_partials'));
            add_action('customize_register', array($this, 'remove_default_customize_section'), 20);
        }

        public static function &getInstance()
        {
            static $instance;
            if (!isset($instance)) {
                $instance = new benko_Customize();
            }
            return $instance;
        }

        protected function customizer()
        {
            $this->panels = array(

                'site_panel' => array(
                    'title'             => esc_html__('Style Setting','benko'),
                    'description'       => esc_html__('Style Setting >','benko'),
                    'priority'          =>  101,
                ),
                'single_panel' => array(
                    'title'             => esc_html__('Blog Single','benko'),
                    'description'       => esc_html__('Blog Single >','benko'),
                    'priority'          =>  104,
                ),
                'sidebar_panel' => array(
                    'title'             => esc_html__('Sidebar','benko'),
                    'description'       => esc_html__('Sidebar Setting','benko'),
                    'priority'          => 105,
                ),
                'benko_option_panel' => array(
                    'title'             => esc_html__('Option','benko'),
                    'description'       => '',
                    'priority'          => 106,
                ),

            );

            $this->customizers = array(
                'title_tagline' => array(
                    'title' => esc_html__('Site Identity', 'benko'),
                    'priority'  =>  1,
                    'settings' => array(
                        'benko_logo' => array(
                            'class' => 'image',
                            'label' => esc_html__('Logo', 'benko'),
                            'description' => esc_html__('Upload Logo Image', 'benko'),
                            'priority' => 12
                        ),
                    )
                ),
//2.General ============================================================================================================
                'benko_general' => array(
                    'title' => esc_html__('General', 'benko'),
                    'description' => '',
                    'priority' => 2,
                    'settings' => array(

                        'benko_bg_body' => array(
                            'label'         => esc_html__('Background - Body', 'benko'),
                            'description'   => '',
                            'class'         => 'color',
                            'priority'      => 2,
                            'params'        => array(
                                'default'   => '',
                            ),
                        ),
                        'benko_primary_body' => array(
                            'label'         => esc_html__('Primary - Color', 'benko'),
                            'description'   => '',
                            'class'         => 'color',
                            'priority'      => 1,
                            'params'        => array(
                                'default'   => '',
                            ),
                        ),
                    )
                ),
//3.Header =============================================================================================================
                'benko_header' => array(
                    'title' => esc_html__('Header', 'benko'),
                    'description' => '',
                    'priority' => 3,
                    'settings' => array(
                        //header benko_topbar
                        'benko_topbar' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Topbar','benko'),
                            'priority' => 0,
                            'params' => array(
                                'default' => false,
                            ),
                        ),

                        'benko_topbar_info' => array(
                            'class' => 'info',
                            'label' => esc_html__('Info', 'benko'),
                            'description' => esc_html__( 'Please goto Appearance > Widgets > drop drag widget to the sidebar Topbar Left and the sidebar Topbar Right.', 'benko' ),
                            'priority' => 1,
                        ),


                        'benko_header_heading' => array(
                            'class' => 'heading',
                            'label' => esc_html__('Header', 'benko'),
                            'priority' => 2,
                        ),

                        'benko_header' => array(
                            'class'=> 'layout',
                            'label' => esc_html__('Header Layout', 'benko'),
                            'priority' =>3,
                            'choices' => array(
                                'simple'                   => get_template_directory_uri().'/assets/images/header/default.png',
                                'center'                   => get_template_directory_uri().'/assets/images/header/center.png',
                                'left'                     => get_template_directory_uri().'/assets/images/header/left.png',
                            ),
                            'params' => array(
                                'default' => 'left',
                            ),
                        ),
                        'benko_keep_menu' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Keep Menu','benko'),
                            'priority' => 6,
                            'params' => array(
                                'default' => false,
                            ),
                        ),
                        'benko_bg_header' => array(
                            'label'         => esc_html__('Background - Header', 'benko'),
                            'description'   => '',
                            'class'         => 'color',
                            'priority'      => 7,
                            'params'        => array(
                                'default'   => '',
                            ),
                        ),

                        'benko_color_menu' => array(
                            'label'         => esc_html__('Color - Text', 'benko'),
                            'description'   => '',
                            'class'         => 'color',
                            'priority'      => 8,
                            'params'        => array(
                                'default'   => '',
                            ),
                        ),
                    )
                ),
//4.Footer =============================================================================================================
                'benko_new_section_footer' => array(
                    'title' => esc_html__('Footer', 'benko'),
                    'description' => '',
                    'priority' => 4,
                    'settings' => array(
                        'benko_footer' => array(
                            'type' => 'select',
                            'label' => esc_html__('Choose Footer Style', 'benko'),
                            'description' => '',
                            'priority' => -1,
                            'choices' => array(
                                '1'     => esc_html__('Footer 1', 'benko'),
                                'hidden' => esc_html__('Hidden Footer', 'benko')
                            ),
                            'params' => array(
                                'default' => '1',
                            ),
                        ),


                        'benko_enable_footer' => array(
                            'type' => 'checkbox',
                            'label' => esc_html__('Enable Footer', 'benko'),
                            'description' => '',
                            'priority' => 0,
                            'params' => array(
                                'default' => '1',
                            ),
                        ),
                        'benko_enable_copyright' => array(
                            'type' => 'checkbox',
                            'label' => esc_html__('Enable Copyright', 'benko'),
                            'description' => '',
                            'priority' => 0,
                            'params' => array(
                                'default' => '1',
                            ),
                        ),
                        'benko_copyright_text' => array(
                            'type' => 'textarea',
                            'label' => esc_html__('Footer Copyright Text', 'benko'),
                            'description' => '',
                            'priority' => 0,
                        ),

                        'benko_bg_footer' => array(
                            'label'         => esc_html__('Background - Footer', 'benko'),
                            'description'   => '',
                            'class'         => 'color',
                            'priority'      => 5,
                            'params'        => array(
                                'default'   => '',
                            ),

                        ),
                        'benko_color_footer' => array(
                            'label'         => esc_html__('Color - Text ', 'benko'),
                            'description'   => '',
                            'class'         => 'color',
                            'priority'      => 6,
                            'params'        => array(
                                'default'   => '',
                            ),

                        ),
                    )
                ),

//5.Categories Blog ====================================================================================================
                'benko_blog' => array(
                    'title' => esc_html__('Blogs Categories', 'benko'),
                    'description' => '',
                    'priority' => 103,
                    'settings' => array(

                        'benko_sidebar_cat' => array(
                            'class'         => 'layout',
                            'label'         => esc_html__('Sidebar Layout', 'benko'),
                            'priority'      =>3,
                            'choices'       => array(
                                'left'         => get_template_directory_uri().'/assets/images/left.png',
                                'right'        => get_template_directory_uri().'/assets/images/right.png',
                                'full'         => get_template_directory_uri().'/assets/images/full.png',
                            ),
                            'params' => array(
                                'default' => 'right',
                            ),
                        ),
                        'benko_siderbar_cat_info' => array(
                            'class' => 'info',
                            'label' => esc_html__('Info', 'benko'),
                            'description' => esc_html__( 'Please goto Appearance > Widgets > drop drag widget to the sidebar Article.', 'benko' ),
                            'priority' => 4,
                        ),
                        //post-layout-cat
                        'benko_title_cat_heading' => array(
                            'class' => 'heading',
                            'label' => esc_html__('Post Title Category', 'benko'),
                            'priority' =>5,
                        ),
                        'benko_post_title_heading' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Title Category ','benko'),
                            'priority' => 6,
                            'params' => array(
                                'default' => true,
                            ),
                        ),
                        'benko_cat_image' => array(
                            'class'         => 'image',
                            'priority'      =>6,
                            'label'         => esc_html__('Background Image', 'benko'),
                            'params'        => array(
                                'default'   => '',
                            ),
                            'sanitize_callback' =>0,
                        ),
                        'benko_cat_bg' => array(
                            'label'         => esc_html__('Background - Color', 'benko'),
                            'description'   => '',
                            'class'         => 'color',
                            'priority'      => 7,
                            'params'        => array(
                                'default'   => '',
                            ),

                        ),

                        'benko_post_cat_layout' => array(
                            'class' => 'heading',
                            'label' => esc_html__('Category layout', 'benko'),
                            'priority' =>8,
                        ),
                        'benko_layout_cat_content' => array(
                            'class'         => 'layout',
                            'priority'      =>9,
                            'choices'       => array(
                                'grid-large'        => get_template_directory_uri().'/assets/images/box-tran.jpg',
                                'grid'        => get_template_directory_uri().'/assets/images/box-grid.jpg',
                                'list'        => get_template_directory_uri().'/assets/images/box-list.jpg',
                            ),
                            'params' => array(
                                'default' => 'grid-large',
                            ),
                        ),
                        //post meta
                        'benko_cat_meta' => array(
                            'class' => 'heading',
                            'label' => esc_html__('Post meta', 'benko'),
                            'priority' =>13,
                        ),

                        'benko_post_meta_date' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Date ','benko'),
                            'priority' => 16,
                            'params' => array(
                                'default' => true,
                            ),
                        ),
                        'benko_post_meta_author' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Author ','benko'),
                            'priority' => 17,
                            'params' => array(
                                'default' => false,
                            ),
                        ),

                    ),
                ),
//6.Single blog ========================================================================================================
                'benko_single_sidebar' => array(
                    'title' => esc_html__('Layouts', 'benko'),
                    'description' => '',
                    'panel' =>'single_panel',
                    'priority' => 6,
                    'settings' => array(


                        'benko_single_style' => array(
                            'type' => 'select',
                            'label' => esc_html__('Post Layouts', 'benko'),
                            'priority' => 5,
                            'choices' => array(
                                '1' => esc_html__( 'Style 1', 'benko' ),
                                '2' => esc_html__( 'Style 2', 'benko' ),
                                '3' => esc_html__( 'Style 3', 'benko' ),
                            ),
                            'params' => array(
                                'default' => '1',
                            ),
                        ),
                        'benko_siderbar_single2_info' => array(
                            'class' => 'info',
                            'label' => esc_html__('Info', 'benko'),
                            'description' => esc_html__( 'When you active use Single sidebar , Please goto Appearance > Widgets > drop drag widget to the sidebar Single  not sidebar Blog.', 'benko' ),
                            'priority' => 5,
                        ),
                    ),
                ),

                //Share
                'benko_single_layout' => array(
                    'title' => esc_html__('Social Share', 'benko'),
                    'description' => '',
                    'panel' =>'single_panel',
                    'priority' => 6,
                    'settings' => array(
                        //share
                        'benko_share_facebook' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Share Facebook  ','benko'),
                            'priority' => 21,
                            'params' => array(
                                'default' => false,
                            ),
                        ),
                        'benko_share_twitter' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Share Twitter  ','benko'),
                            'priority' => 22,
                            'params' => array(
                                'default' => false,
                            ),
                        ),
                        'benko_share_google' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Share Google  ','benko'),
                            'priority' => 23,
                            'params' => array(
                                'default' => false,
                            ),
                        ),
                        'benko_share_linkedin' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Share Linkedin  ','benko'),
                            'priority' => 24,
                            'params' => array(
                                'default' => false,
                            ),
                        ),
                        'benko_share_pinterest' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Share Pinterest  ','benko'),
                            'priority' => 25,
                            'params' => array(
                                'default' => false,
                            ),
                        ),
                        'benko_share_whatsapp' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Share Whatsapp  ','benko'),
                            'priority' => 26,
                            'params' => array(
                                'default' => false,
                            ),
                        )
                    ),
                ),
                //Comments
                'benko_single_comments' => array(
                    'title' => esc_html__('Comments', 'benko'),
                    'description' => '',
                    'panel' =>'single_panel',
                    'priority' => 6,
                    'settings' => array(
                        //comments
                        'benko_comments' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Comments Box', 'benko'),
                            'priority' =>16,
                            'params' => array(
                                'default' => true,
                            ),
                        ),
                        'benko_comments_heading' => array(
                            'class' => 'heading',
                            'label' => esc_html__('Options', 'benko'),
                            'priority' =>18,
                        ),
                        'benko_comments_single_facebook' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Enable Facebook Comments ','benko'),
                            'priority' => 29,
                            'params' => array(
                                'default' => false,
                            ),
                        ),

                        'benko_comments_single' => array(
                            'type'          => 'text',
                            'label'         => esc_html__('Your app id :', 'benko'),
                            'priority'      => 30,
                            'params'        => array(
                                'default'   => '',
                            ),
                        ),
                        'benko_comments_single_info' => array(
                            'class' => 'info',
                            'label' => esc_html__('Info', 'benko'),
                            'description' => esc_html__('If you want show notification on  your facebook , please input app id ...', 'benko' ),
                            'priority' => 31,
                        ),
                    ),
                ),

                'benko_single_meta' => array(
                    'title' => esc_html__('Meta', 'benko'),
                    'description' => '',
                    'panel' =>'single_panel',
                    'priority' => 6,
                    'settings' => array(
                        //avatar-meta
                        'benko_avatar_meta' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Author', 'benko'),
                            'priority' =>1,
                            'params' => array(
                                'default' => true,
                            ),
                        ),
                        'benko_avatar_meta_info' => array(
                            'class' => 'info',
                            'label' => esc_html__('Info', 'benko'),
                            'description' => esc_html__( 'Show or Hidden  Author under the Title Post.If you want to disable/enable Author Box under Post , Please put or delete description in the User > Your profile > Biographical Info ', 'benko' ),
                            'priority' => 2,
                        ),
                        //avatar-meta
                        'benko_image_meta' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Featured Image', 'benko'),
                            'priority' =>3,
                            'params' => array(
                                'default' => true,
                            ),
                        ),
                    ),
                ),
                'benko_single_related' => array(
                    'title' => esc_html__('Related Box', 'benko'),
                    'description' => '',
                    'panel' =>'single_panel',
                    'priority' => 6,
                    'settings' => array(
                        //related_posts
                        'benko_related' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Related Posts', 'benko'),
                            'priority' =>17,
                            'params' => array(
                                'default' => true,
                            ),
                        ),
                        'benko_related_heading' => array(
                            'class' => 'heading',
                            'label' => esc_html__('Options', 'benko'),
                            'priority' =>18,
                        ),
                        'benko_related_number' => array(
                            'type' => 'select',
                            'label' => esc_html__('Number Post Show', 'benko'),
                            'description' => '',
                            'priority' => 25,
                            'choices' => array(
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '4',
                                '6' => '6',
                                '8' => '8',
                            ),
                            'params' => array(
                                'default' => '3',
                            ),

                        ),
                        'benko_related_rows' => array(
                            'type' => 'select',
                            'label' => esc_html__('Number Rows', 'benko'),
                            'description' => '',
                            'priority' => 25,
                            'choices' => array(
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ),
                            'params' => array(
                                'default' => '3',
                            ),

                        ),
                    ),
                ),

                'benko_single_readmore' => array(
                    'title' => esc_html__('Read More Box', 'benko'),
                    'description' => '',
                    'panel' =>'single_panel',
                    'priority' => 6,
                    'settings' => array(
                        //Read More
                        'benko_readmore_box' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Read More Box', 'benko'),
                            'priority' =>1,
                            'params' => array(
                                'default' => false,
                            ),
                        ),
                        'benko_readmore_heading' => array(
                            'class' => 'heading',
                            'label' => esc_html__('Options', 'benko'),
                            'priority' =>2,
                        ),
                        'benko_readmore_cat' => array(
                            'class'          => 'multiple',
                            'label'         => esc_html__('Categories', 'benko'),
                            'choices'       => benko_get_categories_select(),
                            'priority'      => 3,
                            'params'        => array(
                                'default'       => esc_html__('', 'benko'),
                            ),

                        ),
                        'benko_readmore_layout' => array(
                            'class'         => 'layout',
                            'priority'      =>4,
                            'label'         => esc_html__('Layouts', 'benko'),
                            'choices'       => array(
                                'grid'        => get_template_directory_uri().'/assets/images/box-grid.jpg',
                                'list'        => get_template_directory_uri().'/assets/images/box-list.jpg',
                            ),
                            'params' => array(
                                'default' => 'list',
                            ),
                        ),
                        'benko_readmore_show' => array(
                            'class' => 'slider',
                            'label' => esc_html__('Number of posts displayed on a page', 'benko'),
                            'description' => '',
                            'priority' =>5,
                            'choices' => array(
                                'max' => 10,
                                'min' => 2,
                                'step' => 1
                            ),
                            'params'      => array(
                                'default' =>6
                            ),
                        ),
                        'benko_readmore_content' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Content Article', 'benko'),
                            'class' => 'toggle',
                            'priority' =>6,
                            'params' => array(
                                'default' => false,
                            ),
                        ),
                        'benko_readmore_view_cats' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Category', 'benko'),
                            'class' => 'toggle',
                            'priority' =>7,
                            'params' => array(
                                'default' => true,
                            ),
                        ),
                        'benko_readmore_meta' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Meta Article', 'benko'),
                            'priority' =>8,
                            'params' => array(
                                'default' => false,
                            ),
                        ),
                        'benko_readmore_btn' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Load More Button', 'benko'),
                            'priority' =>9,
                            'params' => array(
                                'default' => true,
                            ),
                        ),

                    ),
                ),
//7.Adsense blog ========================================================================================================
                'benko_ads' => array(
                    'title' => esc_html__('Adsense Setting', 'benko'),
                    'description' => '',
                    'panel' =>'single_panel',
                    'priority' => 7,
                    'settings' => array(

                        'benko_ads_rectangle' => array(
                            'type' => 'textarea',
                            'label' => esc_html__(' ADS Size: Large Rectangle', 'benko'),
                            'description' => '',
                            'priority' => 1,
                        ),
                        'benko_ads_rectangle_info' => array(
                            'class' => 'info',
                            'label' => esc_html__('Info', 'benko'),
                            'description' => esc_html__('Add code ads by google with the size is:300x250', 'benko' ),
                            'priority' => 2,
                        ),
                        'benko_ads_leaderboard' => array(
                            'type' => 'textarea',
                            'label' => esc_html__('ADS Size: Leaderboard', 'benko'),
                            'description' => 'Add code ads by google with the size is: 468x60 ,728x90, 920x180 ...',
                            'priority' => 3,
                        ),
                        'benko_ads_vertical' => array(
                            'type' => 'textarea',
                            'label' => esc_html__('ADS Size: Rectangle Vertical', 'benko'),
                            'description' => 'Add code ads by google with the size is: 160x600',
                            'priority' => 4,
                        ),

                        'benko_ads_bottom' => array(
                            'type' => 'textarea',
                            'label' => esc_html__('ADS Size:Billboard', 'benko'),
                            'description' => 'You can place any size ad in this responsive area.',
                            'priority' => 5,
                        ),

                        'benko_heading_ads_single' => array(
                            'class' => 'heading',
                            'label' => esc_html__('Position AD', 'benko'),
                            'priority' =>20,
                        ),
                        'benko_ads_single_top' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Ad  the top of the post','benko'),
                            'priority' => 21,
                            'params' => array(
                                'default' => false,
                            ),
                        ),
                        'benko_ads_single_article' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Ad right of the post','benko'),
                            'priority' => 22,
                            'params' => array(
                                'default' => false,
                            ),
                        ),
                        'benko_ads_after_content' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Ad bottom of the post','benko'),
                            'priority' => 23,
                            'params' => array(
                                'default' => false,
                            ),
                        ),
                        'benko_ads_single_comment' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Ad located between the boxes','benko'),
                            'priority' => 24,
                            'params' => array(
                                'default' => false,
                            ),
                        ),

                        'benko_ads_single_bottom' => array(
                            'class' => 'toggle',
                            'label' => esc_html__('Ad Under the bottom of the post','benko'),
                            'priority' => 25,
                            'params' => array(
                                'default' => false,
                            ),
                        ),
                    )
                ),
//Font   ===============================================================================================================
                'benko_new_section_font_size' => array(
                    'title' => esc_html__('Font', 'benko'),
                    'priority' => 8,
                    'settings' => array(
                        'benko_body_font_google' => array(
                            'type'          => 'select',
                            'label'         => esc_html__('Body Font', 'benko'),
                            'choices'       => benko_googlefont(),
                            'priority'      => 0,
                            'params'        => array(
                                'default'       => 'Roboto',
                            ),

                        ),
                        'benko_body_font_size' => array(
                            'class' => 'slider',
                            'label' => esc_html__('Font size Body ', 'benko'),
                            'description' => '',
                            'priority' =>8,
                            'choices' => array(
                                'max' => 30,
                                'min' => 10,
                                'step' => 1
                            ),
                            'params'      => array(
                                'default' => 16,
                            ),
                        ),

                        'benko_title_font_google' => array(
                            'type'          => 'select',
                            'label'         => esc_html__('Title Font', 'benko'),
                            'choices'       => benko_googlefont(),
                            'priority'      => 9,
                            'params'        => array(
                                'default'       => 'Roboto',
                            ),

                        ),
                        'benko_menu_font_google' => array(
                            'type'          => 'select',
                            'label'         => esc_html__('Menu Font', 'benko'),
                            'choices'       => benko_googlefont(),
                            'priority'      => 10,
                            'params'        => array(
                                'default'       => 'Roboto',
                            ),

                        ),

                    )
                ),
//Style  ===============================================================================================================


            );
        }

        public function benko_customizer_script()
        {
            // Register
            wp_enqueue_style('benko-customize', get_template_directory_uri() . '/inc/customize/assets/css/customizer.css', array(),null);
            wp_enqueue_style('jquery-ui', get_template_directory_uri() . '/inc/customize/assets/css/jquery-ui.min.css', array(),null);
            wp_enqueue_script('benko-customize', get_template_directory_uri() . '/inc/customize/assets/js/customizer.js', array('jquery'), null, true);
        }

        public function add_customize($customizers) {
            $this->customizers = array_merge($this->customizers, $customizers);
        }


        public function benko_register_theme_customizer()
        {
            global $wp_customize;

            foreach ($this->customizers as $section => $section_params) {

                //add section
                $wp_customize->add_section($section, $section_params);
                if (isset($section_params['settings']) && count($section_params['settings']) > 0) {
                    foreach ($section_params['settings'] as $setting => $params) {

                        //add setting
                        $setting_params = array();
                        if (isset($params['params'])) {
                            $setting_params = $params['params'];
                            unset($params['params']);
                        }
                        $wp_customize->add_setting($setting, array_merge( array( 'sanitize_callback' => null ), $setting_params));
                        //Get class control
                        $class = 'WP_Customize_Control';
                        if (isset($params['class']) && !empty($params['class'])) {
                            $class = 'WP_Customize_' . ucfirst($params['class']) . '_Control';
                            unset($params['class']);
                        }

                        //add params section and settings
                        $params['section'] = $section;
                        $params['settings'] = $setting;

                        //add controll
                        $wp_customize->add_control(
                            new $class($wp_customize, $setting, $params)
                        );
                    }
                }
            }

            foreach($this->panels as $key => $panel){
                $wp_customize->add_panel($key, $panel);
            }

            return;
        }


        function benko_partials( WP_Customize_Manager $wp_customize ) {

            // Abort if selective refresh is not available.
            if ( ! isset( $wp_customize->selective_refresh ) ) {
                return;
            }
            //logo
            $wp_customize->selective_refresh->add_partial( 'header_site_title', array(
                'selector' => '.site-title a',
                'settings' => array( 'blogname' ),
                'render_callback' => function() {
                    return get_bloginfo( 'name', 'display' );
                },
            ) );
            $wp_customize->selective_refresh->add_partial( 'benko_logo', array(
                'selector' => '.site-logo a'
            ) );
            //ad
            $wp_customize->selective_refresh->add_partial( 'benko_copyright_text', array(
                'selector' => '.coppy-right > span',
            ) );
        }


        public function remove_default_customize_section()
        {
            global $wp_customize;
            $wp_customize->remove_section('header_image');
            $wp_customize->remove_section('nav');
            $wp_customize->remove_section('static_front_page');
            $wp_customize->remove_section('colors');
            $wp_customize->remove_section('background_image');
        }
    }
}
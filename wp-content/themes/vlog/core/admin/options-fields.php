<?php

/* Branding */
Redux::setSection( $opt_name , array(
        'icon'      => ' el-icon-smiley',
        'title'     => esc_html__( 'Branding', 'vlog' ),
        'desc'     => esc_html__( 'Personalize theme by adding your own images', 'vlog' ),
        'fields'    => array(

            array(
                'id'        => 'logo',
                'type'      => 'media',
                'url'       => true,
                'title'     => esc_html__( 'Logo', 'vlog' ),
                'subtitle'      => esc_html__( 'Upload your logo image here, or leave empty to show the website title instead.', 'vlog' ),
                'default'   => array( 'url' => esc_url( get_template_directory_uri().'/assets/img/vlog_logo.png' ) ),
            ),

            array(
                'id'        => 'logo_retina',
                'type'      => 'media',
                'url'       => true,
                'title'     => esc_html__( 'Retina logo (2x)', 'vlog' ),
                'subtitle'      => esc_html__( 'Optionally upload another logo for devices with retina displays. It should be double the size of your standard logo', 'vlog' ),
                'default'   => array( 'url' => esc_url( get_template_directory_uri().'/assets/img/vlog_logo@2x.png' ) ),
            ),

            array(
                'id'        => 'logo_mini',
                'type'      => 'media',
                'url'       => true,
                'title'     => esc_html__( 'Mini logo', 'vlog' ),
                'subtitle'      => esc_html__( 'Optionally upload another logo which may be used as mobile/tablet logo', 'vlog' ),
                'default'   => array( 'url' => esc_url( get_template_directory_uri().'/assets/img/vlog_logo_mini.png' ) ),
            ),

            array(
                'id'        => 'logo_mini_retina',
                'type'      => 'media',
                'url'       => true,
                'title'     => esc_html__( 'Mini retina logo (2x)', 'vlog' ),
                'subtitle'      => esc_html__( 'Upload double sized mini logo for devices with retina displays', 'vlog' ),
                'default'   => array( 'url' => esc_url( get_template_directory_uri().'/assets/img/vlog_logo_mini@2x.png' ) ),
            ),

            array(
                'id'        => 'logo_custom_url',
                'type'      => 'text',
                'title'     => esc_html__( 'Custom logo URL', 'vlog' ),
                'subtitle'  => esc_html__( 'Optionally specify custom URL if you want logo to point out to some other page/website instead of your home page', 'vlog' ),
                'default'   => ''
            ),

            array(
                'id'        => 'default_fimg',
                'type'      => 'media',
                'url'       => true,
                'title'     => esc_html__( 'Default featured image', 'vlog' ),
                'subtitle'      => esc_html__( 'Upload your default featured image/placeholder. It will be displayed for posts that do not have a featured image set.', 'vlog' ),
                'default'   => array( 'url' => esc_url( get_template_directory_uri().'/assets/img/vlog_default.jpg' ) ),
            )
        ) )
);


/* Header */
Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-bookmark',
        'title'     => esc_html__( 'Header', 'vlog' ),
        'fields'    => array(
        ) ) );


/* Main header area */
Redux::setSection( $opt_name , array(
        'icon'      => '',
        'title'     => esc_html__( 'Main', 'vlog' ),
        'desc'     => esc_html__( 'Modify and style your main header area', 'vlog' ),
        'subsection' => true,
        'fields'    => array(

            array(
                'id'        => 'header_layout',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Header layout', 'vlog' ),
                'subtitle' => esc_html__( 'Choose a layout for your header', 'vlog' ),
                'options'   => array(
                    1 => array( 'title' => esc_html__( 'Layout 1', 'vlog' ),       'img' =>  get_template_directory_uri().'/assets/img/admin/header_layout_1.png' ),
                    2 => array( 'title' => esc_html__( 'Layout 2', 'vlog' ),       'img' =>  get_template_directory_uri().'/assets/img/admin/header_layout_2.png' ),
                    3 => array( 'title' => esc_html__( 'Layout 3', 'vlog' ),       'img' =>  get_template_directory_uri().'/assets/img/admin/header_layout_3.png' ),
                    4 => array( 'title' => esc_html__( 'Layout 4', 'vlog' ),       'img' =>  get_template_directory_uri().'/assets/img/admin/header_layout_4.png' ),
                    5 => array( 'title' => esc_html__( 'Layout 5', 'vlog' ),       'img' =>  get_template_directory_uri().'/assets/img/admin/header_layout_5.png' ),
                    6 => array( 'title' => esc_html__( 'Layout 6', 'vlog' ),       'img' =>  get_template_directory_uri().'/assets/img/admin/header_layout_6.png' )
                ),
                'default'   => 1,

            ),

            array(
                'id'        => 'header_site_desc',
                'type'      => 'switch',
                'title'     => esc_html__( 'Enable site description', 'vlog' ),
                'subtitle' => esc_html__( 'Check if you want to display site description below logo', 'vlog' ),
                'default'   => 0,

            ),

            array(
                'id'        => 'header_actions',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => esc_html__( 'Enable special elements in navigation', 'vlog' ),
                'subtitle'  => esc_html__( 'Check and reorder special elements you may want to display', 'vlog' ),
                'options'   => vlog_get_header_special_elements(),
                'default'   => vlog_get_header_special_elements( array('search-drop', 'watch-later','social-menu-drop')),
            ),


            array(
                'id' => 'header_height',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'Height', 'vlog' ),
                'subtitle' => esc_html__( 'Specify a height for your main header area', 'vlog' ),
                'desc' => esc_html__( 'Note: Height value is in px.', 'vlog' ),
                'default' => 80,
                'validate' => 'numeric'
            ),

            array(
                'id' => 'color_header_main_bg',
                'type' => 'color',
                'title' => esc_html__( 'Background color', 'vlog' ),
                'transparent' => false,
                'default' => '#ffffff',
            ),

            array(
                'id'       => 'background_header',
                'type'     => 'background',
                'title'    => esc_html__( 'Background image', 'vlog' ),
                'subtitle' => esc_html__( 'Optionally upload background image or pattern', 'vlog' ),
                'background-color' => false,
                'default'  => array(),
            ),

            array(
                'id' => 'color_header_main_txt',
                'type' => 'color',
                'title' => esc_html__( 'Text color', 'vlog' ),
                'transparent' => false,
                'default' => '#111111',
            ),

            array(
                'id' => 'color_header_main_acc',
                'type' => 'color',
                'title' => esc_html__( 'Accent color', 'vlog' ),
                'transparent' => false,
                'default' => '#9b59b6',
            ),

            array(
                'id' => 'color_header_bottom_bg',
                'type' => 'color',
                'title' => esc_html__( 'Bottom bar background color', 'vlog' ),
                'transparent' => false,
                'default' => '#f6f6f6',
                'required' => array( 'header_layout', '=', array( 3, 4, 5, 6 ) )
            ),

            array(
                'id' => 'color_header_bottom_txt',
                'type' => 'color',
                'title' => esc_html__( 'Bottom bar text color', 'vlog' ),
                'transparent' => false,
                'default' => '#111111',
                'required' => array( 'header_layout', '=', array( 3, 4, 5, 6 ) )
            ),

            array(
                'id' => 'color_header_bottom_acc',
                'type' => 'color',
                'title' => esc_html__( 'Bottom bar accent color', 'vlog' ),
                'transparent' => false,
                'default' => '#9b59b6',
                'required' => array( 'header_layout', '=', array( 3, 4, 5, 6 ) )
            ),

            array(
                'id'        => 'header_shadow',
                'type'      => 'switch',
                'title'     => esc_html__( 'Apply bottom shadow', 'vlog' ),
                'subtitle'  => esc_html__( 'Check if you want to apply bottom shadow to main header bar', 'vlog' ),
                'default'   => true,
            ),

        ) )
);


/* Top Bar */
Redux::setSection( $opt_name , array(
        'icon'      => '',
        'title'     => esc_html__( 'Top Bar', 'vlog' ),
        'desc'     => esc_html__( 'Modify and style your header top bar', 'vlog' ),
        'subsection' => true,
        'fields'    => array(

            array(
                'id'        => 'header_top',
                'type'      => 'switch',
                'title'     => esc_html__( 'Header top bar', 'vlog' ),
                'subtitle'  => esc_html__( 'Check if you want to enable header top bar', 'vlog' ),
                'default'   => false,
            ),


            array(
                'id' => 'color_header_top_bg',
                'type' => 'color',
                'title' => esc_html__( 'Background color', 'vlog' ),
                'transparent' => false,
                'default' => '#34495e',
                'required' => array( 'header_top', '=', true )
            ),

            array(
                'id' => 'color_header_top_txt',
                'type' => 'color',
                'title' => esc_html__( 'Text color', 'vlog' ),
                'transparent' => false,
                'default' => '#8b97a3',
                'required' => array( 'header_top', '=', true )
            ),

            array(
                'id' => 'color_header_top_acc',
                'type' => 'color',
                'title' => esc_html__( 'Accent color', 'vlog' ),
                'transparent' => false,
                'default' => '#ffffff',
                'required' => array( 'header_top', '=', true )
            ),

            array(
                'id' => 'header_top_l',
                'type' => 'select',
                'title' => esc_html__( 'Left slot', 'vlog' ),
                'subtitle' => esc_html__( 'Choose an element to display in left slot of header top bar', 'vlog' ),
                'options' => vlog_get_header_top_elements(),
                'default' => 'secondary-menu-1',
                'required' => array( 'header_top', '=', true )
            ),

            array(
                'id' => 'header_top_c',
                'type' => 'select',
                'title' => esc_html__( 'Center slot', 'vlog' ),
                'subtitle' => esc_html__( 'Choose an element to display in center slot of header top bar', 'vlog' ),
                'options' => vlog_get_header_top_elements(),
                'default' => '0',
                'required' => array( 'header_top', '=', true )
            ),

            array(
                'id' => 'header_top_r',
                'type' => 'select',
                'title' => esc_html__( 'Right slot', 'vlog' ),
                'subtitle' => esc_html__( 'Choose an element to display in right slot of header top bar', 'vlog' ),
                'options' => vlog_get_header_top_elements(),
                'default' => 'social-menu',
                'required' => array( 'header_top', '=', true )
            ),



        ) )
);


/* Sticky header area */
Redux::setSection( $opt_name , array(
        'icon'      => '',
        'title'     => esc_html__( 'Sticky Header', 'vlog' ),
        'desc'     => esc_html__( 'Modify and style your sticky header area', 'vlog' ),
        'subsection' => true,
        'fields'    => array(

            array(
                'id'        => 'header_sticky',
                'type'      => 'switch',
                'title'     => esc_html__( 'Display sticky header', 'vlog' ),
                'subtitle'  => esc_html__( 'Check if you want to enable sticky header', 'vlog' ),
                'default'   => true,
            ),

            array(
                'id'        => 'header_sticky_offset',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => esc_html__( 'Sticky header offset', 'vlog' ),
                'subtitle'  => esc_html__( 'Specify after how many px of scrolling the sticky header appears', 'vlog' ),
                'default'   => 600,
                'validate'  => 'numeric',
                'required' => array( 'header_sticky', '=', true )
            ),

            array(
                'id'        => 'header_sticky_up',
                'type'      => 'switch',
                'title'     => esc_html__( 'Smart sticky', 'vlog' ),
                'subtitle'  => esc_html__( 'Sticky header appears only if you scroll up', 'vlog' ),
                'default'   => false,
            ),

            array(
                'id'        => 'header_sticky_logo',
                'type'      => 'radio',
                'title'     => esc_html__( 'Sticky header logo', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose which logo to display on sticky header', 'vlog' ),
                'options'   => array(
                    'main' => esc_html__( 'Main logo', 'vlog' ),
                    'mini' => esc_html__( 'Mini (mobile) logo', 'vlog' ),
                ),
                'default'   => 'main',
                'required' => array( 'header_sticky', '=', true )
            ),

            array(
                'id'        => 'header_sticky_colors',
                'type'      => 'radio',
                'title'     => esc_html__( 'Choose sticky header colors from', 'vlog' ),
                'options'   => array(
                    'main' => esc_html__( 'Main header colors', 'vlog' ),
                    'bottom' => esc_html__( 'Header bottom bar colors', 'vlog' ),
                    'sticky' =>esc_html__( 'Custom colors', 'vlog' )
                ),
                'default'   => 'main',
            ),


            array(
                'id' => 'color_header_sticky_bg',
                'type' => 'color',
                'title' => esc_html__( 'Background color', 'vlog' ),
                'transparent' => false,
                'default' => '#0288d1',
                'required' => array( 'header_sticky_colors', '=', 'sticky' )
            ),


            array(
                'id' => 'color_header_sticky_txt',
                'type' => 'color',
                'title' => esc_html__( 'Text color', 'vlog' ),
                'transparent' => false,
                'default' => '#ffffff',
                'required' => array( 'header_sticky_colors', '=', 'sticky' )
            ),

            array(
                'id' => 'color_header_sticky_acc',
                'type' => 'color',
                'title' => esc_html__( 'Accent color', 'vlog' ),
                'transparent' => false,
                'default' => '#444444',
                'required' => array( 'header_sticky_colors', '=', 'sticky' )
            )
        ) ) );



/* Mega menu */
Redux::setSection( $opt_name , array(
        'icon'      => '',
        'title'     => esc_html__( 'Mega Menu', 'vlog' ),
        'desc'     => esc_html__( 'Manage settings for mega menu', 'vlog' ),
        'subsection' => true,
        'fields'    => array(

            array(
                'id'        => 'mega_menu',
                'type'      => 'switch',
                'title'     => esc_html__( 'Enable mega menu', 'vlog' ),
                'subtitle'  => esc_html__( 'Check if you want to enable mega menu functionality', 'vlog' ),
                'default'   => true,
            ),

            array(
                'id'        => 'mega_menu_limit',
                'type'      => 'text',
                'class' => 'small-text',
                'title'     => esc_html__( 'Number of posts', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose max number of posts in mega menu', 'vlog' ),
                'default'   => 4,
                'validate' => 'numeric',
                'required' => array( 'mega_menu', '=', true )
            ),

        ) ) );

/* Responsive header */
Redux::setSection( $opt_name , array(
        'icon'      => '',
        'title'     => esc_html__( 'Responsive Menu', 'vlog' ),
        'desc'     => esc_html__( 'Manage settings for responsive/mobile menu', 'vlog' ),
        'subsection' => true,
        'fields'    => array(

            array(
                'id'        => 'rensponsive_secondary_nav',
                'type'      => 'switch',
                'title'     => esc_html__( 'Append secondary navigation', 'vlog' ),
                'subtitle'  => esc_html__( 'If secondary menus are used, it will be applied to the bottom of the main navigation', 'vlog' ),
                'default' => false
            ),

            array(
                'id'        => 'responsive_more_link',
                'type'      => 'switch',
                'title'     => esc_html__( 'Group secondary menus under the "more" link', 'vlog' ),
                'subtitle'  => esc_html__( 'Enable this option if you want to group secondary menus under a single "more" link', 'vlog' ),
                'default'   => false,
                'required' => array( 'rensponsive_secondary_nav', '=', 1 )
            ),

             array(
                'id'        => 'responsive_social_nav',
                'type'      => 'switch',
                'title'     => esc_html__( 'Append social menu', 'vlog' ),
                'subtitle'  => esc_html__( 'If social menu is used, it will be applied to the bottom of the main navigation', 'vlog' ),
                'default'   => false,
            ),

            array(
                'id'        => 'responsive_header_actions',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => esc_html__( 'Enable special elements in header in responsive mode', 'vlog' ),
                'subtitle'  => esc_html__( 'Check and reorder special elements you may want to display on tablets/mobiles', 'vlog' ),
                'options'   => vlog_get_header_special_elements( array(), array('search-form','social-menu', 'social-menu-drop')),
                'default'   => vlog_get_header_special_elements( array('search-drop', 'watch-later')),
            ),

        ) ) );



/* Content */
Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-screen',
        'title'     => esc_html__( 'Content', 'vlog' ),
        'desc'     => esc_html__( 'Manage your main content styling options', 'vlog' ),
        'fields'    => array(

            array(
                'id'        => 'content_layout',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Content layout', 'vlog' ),
                'options'   => array(
                    'wide' => array( 'title' => esc_html__( 'Wide', 'vlog' ),       'img' =>  get_template_directory_uri().'/assets/img/admin/content_full.png' ),
                    'boxed' => array( 'title' => esc_html__( 'Boxed', 'vlog' ),       'img' => get_template_directory_uri().'/assets/img/admin/content_boxed.png' ),
                ),
                'default'   => 'wide',

            ),

            array(
                'id'       => 'body_background',
                'type'     => 'background',
                'title'    => esc_html__( 'Body background', 'vlog' ),
                'subtitle' => esc_html__( 'Setup your body background color, image or pattern', 'vlog' ),
                'default'  => array(
                    'background-color' => '#bbbbbb',
                ),
                'required' => array( 'content_layout', '=', 'boxed' )
            ),

            array(
                'id' => 'color_content_bg',
                'type' => 'color',
                'title' => esc_html__( 'Content background color', 'vlog' ),
                'subtitle' => esc_html__( 'Specify main content background color', 'vlog' ),
                'transparent' => false,
                'default' => '#ffffff',
            ),

            array(
                'id' => 'color_content_title',
                'type' => 'color',
                'title' => esc_html__( 'Title (heading) color', 'vlog' ),
                'subtitle' => esc_html__( 'This color applies to headings, post/page tiles, widget titles, etc... ', 'vlog' ),
                'transparent' => false,
                'default' => '#111111',
            ),

            array(
                'id' => 'color_content_txt',
                'type' => 'color',
                'title' => esc_html__( 'Text color', 'vlog' ),
                'subtitle' => esc_html__( 'This color applies to standard text', 'vlog' ),
                'transparent' => false,
                'default' => '#111111',
            ),

            array(
                'id' => 'color_content_acc',
                'type' => 'color',
                'title' => esc_html__( 'Accent color', 'vlog' ),
                'subtitle' => esc_html__( 'This color applies to links, buttons, pagination, etc...', 'vlog' ),
                'transparent' => false,
                'default' => '#9b59b6',
            ),

            array(
                'id' => 'color_content_meta',
                'type' => 'color',
                'title' => esc_html__( 'Meta color', 'vlog' ),
                'subtitle' => esc_html__( 'This color applies to miscellaneous elements like post meta data (author link, date, etc...)', 'vlog' ),
                'transparent' => false,
                'default' => '#999999',
            ),

            array(
                'id' => 'color_highlight_bg',
                'type' => 'color',
                'title' => esc_html__( 'Highlight background color', 'vlog' ),
                'subtitle' => esc_html__( 'Background color for highlighted elements', 'vlog' ),
                'transparent' => false,
                'default' => '#34495e',
            ),

            array(
                'id' => 'color_highlight_txt',
                'type' => 'color',
                'title' => esc_html__( 'Highlight text color', 'vlog' ),
                'subtitle' => esc_html__( 'Text color for highlighted elements', 'vlog' ),
                'transparent' => false,
                'default' => '#ffffff',
            ),
        ) )
);




/* Footer */

Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-bookmark-empty',
        'title'     => esc_html__( 'Footer', 'vlog' ),
        'desc'     => esc_html__( 'Manage options for your footer area', 'vlog' ),
        'fields'    => array(

            array(
                'id' => 'color_footer_bg',
                'type' => 'color',
                'title' => esc_html__( 'Background color', 'vlog' ),
                'subtitle' => esc_html__( 'Specify footer background color', 'vlog' ),
                'transparent' => false,
                'default' => '#34495e',
            ),

            array(
                'id' => 'color_footer_txt',
                'type' => 'color',
                'title' => esc_html__( 'Text color', 'vlog' ),
                'subtitle' => esc_html__( 'This is the standard text color for footer', 'vlog' ),
                'transparent' => false,
                'default' => '#ffffff',
            ),

            array(
                'id' => 'color_footer_acc',
                'type' => 'color',
                'title' => esc_html__( 'Accent color', 'vlog' ),
                'subtitle' => esc_html__( 'This color will apply to buttons, links, etc...', 'vlog' ),
                'transparent' => false,
                'default' => '#ffffff',
            ),

            array(
                'id' => 'footer_widgets',
                'type' => 'switch',
                'switch' => true,
                'title' => esc_html__( 'Display footer widgetized area', 'vlog' ),
                'subtitle' => wp_kses( sprintf( __( 'Check if you want to include footer widgetized area in your theme. You can manage the footer content in the <a href="%s">Apperance -> Widgets</a> settings.', 'vlog' ), admin_url( 'widgets.php' ) ), wp_kses_allowed_html( 'post' ) ),
                'default' => true
            ),

            array(
                'id'        => 'footer_layout',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Footer columns', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose number of columns to display in footer area', 'vlog' ),
                'desc'  => wp_kses( sprintf( __( 'Note: Each column represents one Footer Sidebar in <a href="%s">Apperance -> Widgets</a> settings.', 'vlog' ), admin_url( 'widgets.php' ) ), wp_kses_allowed_html( 'post' ) ),
                'options'   => array(
                    '1_12' => array( 'title' => esc_html__( '1 Column', 'vlog' ),       'img' => get_template_directory_uri().'/assets/img/admin/footer_col_1.png' ),
                    '2_6' => array( 'title' => esc_html__( '2 Columns', 'vlog' ),       'img' => get_template_directory_uri().'/assets/img/admin/footer_col_2.png' ),
                    '3_4' => array( 'title' => esc_html__( '3 Columns', 'vlog' ),       'img' => get_template_directory_uri().'/assets/img/admin/footer_col_3.png' ),
                    '4_3' => array( 'title' => esc_html__( '4 Columns', 'vlog' ),       'img' => get_template_directory_uri().'/assets/img/admin/footer_col_4.png' )
                ),
                'default'   => '3_4',
                'required' => array( 'footer_widgets', '=', true )
            ),

            array(
                'id' => 'footer_bottom',
                'type' => 'switch',
                'title' => esc_html__( 'Display footer bottom bar', 'vlog' ),
                'subtitle' => esc_html__( 'Check if you want to display footer bottom bar', 'vlog' ),
                'default' => true
            ),

            array(
                'id' => 'footer_copyright',
                'type' => 'editor',
                'title' => esc_html__( 'Copyright', 'vlog' ),
                'subtitle' => esc_html__( 'Specify the copyright text to show at the bottom of the website', 'vlog' ),
                'default' =>  __( '<p style="text-align: center;">Copyright &copy; {current_year}. Created by <a href="http://mekshq.com" target="_blank">Meks</a>. Powered by <a href="http://www.wordpress.org" target="_blank">WordPress</a>.</p>', 'vlog' ),
                'args'   => array(
                    'textarea_rows'    => 3  ,
                    'default_editor' => 'html'                          ),
                'required' => array( 'footer_bottom', '=', true )
            ),


        ) )
);

/* Sidebars */
Redux::setSection( $opt_name , array(
        'icon'      => ' el-icon-list',
        'title'     => esc_html__( 'Sidebars', 'vlog' ),
        'class'     => 'sidgen',
        'desc' => wp_kses( sprintf( __( 'Use this panel to generate additional sidebars. You can manage sidebars content in the <a href="%s">Apperance -> Widgets</a> settings.', 'vlog' ), admin_url( 'widgets.php' ) ), wp_kses_allowed_html( 'post' ) ),
        'fields'    => array(

            array(
                'id'        => 'sidebars',
                'type'      => 'sidgen',
                'title'     => '',
            ),
        ) ) );

/* Cover Area */
Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-stop',
        'title'     => esc_html__( 'Cover Area', 'vlog' ),
        'heading' => false,
        'fields'    => array(
        ) )
);

/* Cover */
Redux::setSection( $opt_name , array(
        'icon'      => '',
        'title'     => esc_html__( 'General', 'vlog' ),
        'desc'     => esc_html__( 'Manage options for cover area. Please note that each time you change the values for cover area image sizes, you need to run Force Regenerate Thumbnails plugin, as described in theme documentation.', 'vlog' ),
        'subsection' => true,
        'fields'    => array(

            array(
                'id' => 'cover_h',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'Cover area height', 'vlog' ),
                'subtitle' => esc_html__( 'Specify height for your cover area in px', 'vlog' ),
                'validate'  => 'numeric',
                'default' => 500
            ),

            array(
                'id' => 'cover_type',
                'type' => 'radio',
                'title' => esc_html__( 'Cover image format', 'vlog' ),
                'subtitle' => esc_html__( 'Choose format of full cover image', 'vlog' ),
                'options' => array(
                    'fixed' =>  esc_html__( 'Fixed width (crop)', 'vlog' ),
                    'original' =>  esc_html__( 'Keep original ratio', 'vlog' )
                ),
                'default' => 'fixed'
            ),

            array(
                'id' => 'cover_w',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'Cover image width', 'vlog' ),
                'subtitle' => esc_html__( 'Specify width for your cover image in px', 'vlog' ),
                'validate'  => 'numeric',
                'default' => 1500,
                'required'  => array( 'cover_type', '=', 'fixed' )
            ),

            array(
                'id' => 'cover_autoplay',
                'type' => 'switch',
                'title' => esc_html__( 'Autoplay (rotate)', 'vlog' ),
                'subtitle' => esc_html__( 'Check if you want to auto rotate items in cover area sliders', 'vlog' ),
                'default' => false
            ),
            array(
                'id' => 'cover_autoplay_time',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'Autoplay time', 'vlog' ),
                'subtitle' => esc_html__( 'Specify autoplay time per slide', 'vlog' ),
                'desc' => esc_html__( 'Note: Please specify number in seconds', 'vlog' ),
                'default' => 5,
                'validate' => 'numeric',
                'required'  => array( 'cover_autoplay', '=', true )
            ),

            array(
                'id' => 'cover_shadow_enabled',
                'type' => 'switch',
                'title' => esc_html__( 'Cover shadow gradients', 'vlog' ),
                'subtitle' => esc_html__( 'Check if you want to display cover shadow gradients', 'vlog' ),
                'default' => true
            ),

        ) ) );

/* FA Layout 1 */
Redux::setSection( $opt_name , array(
        'icon'      => '',
        'title'     => esc_html__( 'Layout 1', 'vlog' ),
        'heading' => false,
        'subsection' => true,
        'fields'    => array(

            array(
                'id'        => 'section_layout_fa1',
                'type'      => 'section',
                'title'     => '<img src="'.esc_url( get_template_directory_uri().'/assets/img/admin/layout_fa1.png' ).'"/>'.esc_html__( 'Layout 1', 'vlog' ),
                'subtitle'  => esc_html__( 'Manage options for cover Layout 1', 'vlog' ),
                'indent'   => false
            ),

            array(
                'id' => 'lay_fa1_cat',
                'type' => 'switch',
                'title' => esc_html__( 'Display category', 'vlog' ),
                'default' => true
            ),

            array(
                'id' => 'lay_fa1_serie',
                'type' => 'switch',
                'title' => esc_html__( 'Display serie', 'vlog' ),
                'default' => false
            ),

            array(
                'id'        => 'lay_fa1_meta',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => esc_html__( 'Meta data', 'vlog' ),
                'options'   => vlog_get_meta_opts(),
                'default' => vlog_get_meta_opts( array( 'author', 'date' ) )
            ),

            array(
                'id'        => 'lay_fa1_actions',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => esc_html__( 'Actions', 'vlog' ),
                'subtitle'      => esc_html__( 'Watch later, Cinema mode and Subscribe are available for video post format only. Listen later is available for audio post format only.', 'vlog' ),
                'desc' => esc_html__( 'Note: if you are using subscribe button, you must specify the URL in Theme Options -> Misc.', 'vlog' ),
                'options'   => vlog_get_action_opts(),
                'default' => vlog_get_action_opts( array( 'comments', 'watch-later', 'listen-later', 'cinema-mode' ) )
            ),


        ) ) );



/* FA Layout 2 */
Redux::setSection( $opt_name , array(
        'icon'      => '',
        'title'     => esc_html__( 'Layout 2', 'vlog' ),
        'heading' => false,
        'subsection' => true,
        'fields'    => array(

            array(
                'id'        => 'section_layout_fa2',
                'type'      => 'section',
                'title'     => '<img src="'.esc_url( get_template_directory_uri().'/assets/img/admin/layout_fa2.png' ).'"/>'.esc_html__( 'Layout 2', 'vlog' ),
                'subtitle'  => esc_html__( 'Manage options for cover Layout 2', 'vlog' ),
                'indent'   => false
            ),

            array(
                'id' => 'lay_fa2_cat',
                'type' => 'switch',
                'title' => esc_html__( 'Display category', 'vlog' ),
                'default' => true
            ),

             array(
                'id' => 'lay_fa2_serie',
                'type' => 'switch',
                'title' => esc_html__( 'Display serie', 'vlog' ),
                'default' => false
            ),

            array(
                'id'        => 'lay_fa2_meta',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => esc_html__( 'Meta data', 'vlog' ),
                'options'   => vlog_get_meta_opts(),
                'default' => vlog_get_meta_opts( array( 'date' ) )
            ),

            array(
                'id'        => 'lay_fa2_actions',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => esc_html__( 'Actions', 'vlog' ),
                'subtitle'      => esc_html__( 'Watch later, Cinema mode and Subscribe are available for video post format only. Listen later is available for audio post format only.', 'vlog' ),
                'desc' => esc_html__( 'Note: if you are using subscribe button, you must specify the URL in Theme Options -> Misc.', 'vlog' ),
                'options'   => vlog_get_action_opts(),
                'default' => vlog_get_action_opts( array( 'comments', 'watch-later', 'listen-later', 'cinema-mode'  ) )
            ),



        ) ) );

/* FA Layout 3 */
Redux::setSection( $opt_name , array(
        'icon'      => '',
        'title'     => esc_html__( 'Layout 3', 'vlog' ),
        'heading' => false,
        'subsection' => true,
        'fields'    => array(

            array(
                'id'        => 'section_layout_fa3',
                'type'      => 'section',
                'title'     => '<img src="'.esc_url( get_template_directory_uri().'/assets/img/admin/layout_fa3.png' ).'"/>'.esc_html__( 'Layout 3', 'vlog' ),
                'subtitle'  => esc_html__( 'Manage options for cover Layout 3', 'vlog' ),
                'indent'   => false
            ),

            array(
                'id' => 'lay_fa3_cat',
                'type' => 'switch',
                'title' => esc_html__( 'Display category', 'vlog' ),
                'default' => false
            ),

            array(
                'id' => 'lay_fa3_serie',
                'type' => 'switch',
                'title' => esc_html__( 'Display serie', 'vlog' ),
                'default' => false
            ),

            array(
                'id'        => 'lay_fa3_meta',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => esc_html__( 'Meta data', 'vlog' ),
                'options'   => vlog_get_meta_opts(),
                'default' => vlog_get_meta_opts( array( 'date', 'comments' ) )
            ),

            array(
                'id' => 'lay_fa3_format_label',
                'type' => 'switch',
                'title' => esc_html__( 'Display post format label', 'vlog' ),
                'default' => false
            ),

             array(
                'id' => 'lay_fa3_special_tag',
                'type' => 'switch',
                'title' => esc_html__( 'Display special tag label', 'vlog' ),
                'subtitle' => esc_html__( 'Note: You must define your special tag in Theme Options -> Misc.', 'vlog' ),
                'default' => false
            ),


        ) ) );

/* FA Layout 4 */
Redux::setSection( $opt_name , array(
        'icon'      => '',
        'title'     => esc_html__( 'Layout 4', 'vlog' ),
        'heading' => false,
        'subsection' => true,
        'fields'    => array(

            array(
                'id'        => 'section_layout_fa4',
                'type'      => 'section',
                'title'     => '<img src="'.esc_url( get_template_directory_uri().'/assets/img/admin/layout_fa4.png' ).'"/>'.esc_html__( 'Layout 4', 'vlog' ),
                'subtitle'  => esc_html__( 'Manage options for cover Layout 4', 'vlog' ),
                'indent'   => false
            ),

            array(
                'id' => 'lay_fa4_cat',
                'type' => 'switch',
                'title' => esc_html__( 'Display category', 'vlog' ),
                'default' => true
            ),

             array(
                'id' => 'lay_fa4_serie',
                'type' => 'switch',
                'title' => esc_html__( 'Display serie', 'vlog' ),
                'default' => false
            ),

            array(
                'id'        => 'lay_fa4_meta',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => esc_html__( 'Meta data', 'vlog' ),
                'options'   => vlog_get_meta_opts(),
                'default' => vlog_get_meta_opts(  array( 'date', 'comments' ) )
            ),

            array(
                'id' => 'lay_fa4_format_label',
                'type' => 'switch',
                'title' => esc_html__( 'Display post format label', 'vlog' ),
                'default' => true
            ),

             array(
                'id' => 'lay_fa4_special_tag',
                'type' => 'switch',
                'title' => esc_html__( 'Display special tag label', 'vlog' ),
                'subtitle' => esc_html__( 'Note: You must define your special tag in Theme Options -> Misc.', 'vlog' ),
                'default' => true
            ),

        ) ) );

/* FA Layout 5 */
Redux::setSection( $opt_name , array(
        'icon'      => '',
        'title'     => esc_html__( 'Layout 5', 'vlog' ),
        'heading' => false,
        'subsection' => true,
        'fields'    => array(

            array(
                'id'        => 'section_layout_fa5',
                'type'      => 'section',
                'title'     => '<img src="'.esc_url( get_template_directory_uri().'/assets/img/admin/layout_fa5.png' ).'"/>'.esc_html__( 'Layout 5', 'vlog' ),
                'subtitle'  => esc_html__( 'Manage options for cover Layout 5', 'vlog' ),
                'indent'   => false
            ),

            array(
                'id' => 'lay_fa5_cat',
                'type' => 'switch',
                'title' => esc_html__( 'Display category', 'vlog' ),
                'default' => false
            ),

             array(
                'id' => 'lay_fa5_serie',
                'type' => 'switch',
                'title' => esc_html__( 'Display serie', 'vlog' ),
                'default' => false
            ),

            array(
                'id'        => 'lay_fa5_meta',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => esc_html__( 'Meta data', 'vlog' ),
                'options'   => vlog_get_meta_opts(),
                'default' => vlog_get_meta_opts( array( 'date' ) )
            ),

            array(
                'id' => 'lay_fa5_format_label',
                'type' => 'switch',
                'title' => esc_html__( 'Display post format label', 'vlog' ),
                'default' => true
            ),

            array(
                'id' => 'lay_fa5_special_tag',
                'type' => 'switch',
                'title' => esc_html__( 'Display special tag label', 'vlog' ),
                'subtitle' => esc_html__( 'Note: You must define your special tag in Theme Options -> Misc.', 'vlog' ),
                'default' => true
            ),



        ) ) );

/* Layout settings */
Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-th-large',
        'title'     => esc_html__( 'Post Layouts', 'vlog' ),
        'heading' => false,
        'fields'    => array(
        ) )
);


/* Layout A */
Redux::setSection( $opt_name , array(
        'icon'      => '',
        'title'     => esc_html__( 'Layout A', 'vlog' ),
        'heading' => false,
        'subsection' => true,
        'fields'    => array(
            array(
                'id'        => 'section_layout_a',
                'type'      => 'section',
                'title'     => '<img src="'.esc_url( get_template_directory_uri().'/assets/img/admin/layout_a.png' ).'"/>'.esc_html__( 'Layout A', 'vlog' ),
                'subtitle'  => esc_html__( 'Manage options for posts displayed in Layout A', 'vlog' ),
                'indent'   => false
            ),

            array(
                'id' => 'lay_a_cat',
                'type' => 'switch',
                'title' => esc_html__( 'Display category', 'vlog' ),
                'subtitle' => esc_html__( 'Check if you want to display a category link for posts in Layout A', 'vlog' ),
                'default' => true
            ),

            array(
                'id' => 'lay_a_serie',
                'type' => 'switch',
                'title' => esc_html__( 'Display Serie', 'vlog' ),
                'subtitle' => esc_html__( 'Check if you want to display a serie link for posts in Layout A', 'vlog' ),
                'default' => false
            ),

            array(
                'id'        => 'lay_a_meta',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => esc_html__( 'Meta data', 'vlog' ),
                'subtitle'  => esc_html__( 'Check which meta data to show for posts in Layout A', 'vlog' ),
                'options'   => vlog_get_meta_opts(),
                'default' => vlog_get_meta_opts( array( 'author','date', 'comments' ) )
            ),

            array(
                'id' => 'lay_a_content_type',
                'type' => 'radio',
                'title' => esc_html__( 'Layout A content', 'vlog' ),
                'subtitle' => esc_html__( 'Choose how to display content for posts in Layout A', 'vlog' ),
                'options' => array(
                    'content' =>  esc_html__( 'Full content (optionally split with <!--more--> tag)', 'vlog' ),
                    'excerpt' =>  esc_html__( 'Excerpt', 'vlog' ),
                ),
                'default' => 'excerpt'
            ),

            array(
                'id' => 'lay_a_excerpt_limit',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'Excerpt limit', 'vlog' ),
                'subtitle' => esc_html__( 'Specify your excerpt limit', 'vlog' ),
                'desc' => esc_html__( 'Note: Value represents number of characters', 'vlog' ),
                'default' => '290',
                'validate' => 'numeric',
                'required'  => array( 'lay_a_content_type', '=', 'excerpt' )
            ),

            array(
                'id' => 'lay_a_rm',
                'type' => 'switch',
                'title' => esc_html__( 'Read more button', 'vlog' ),
                'subtitle' => esc_html__( 'Display read more button for layout A', 'vlog' ),
                'default' => true
            ),

            array(
                'id' => 'lay_a_format_label',
                'type' => 'switch',
                'title' => esc_html__( 'Display post format label', 'vlog' ),
                'default' => true
            ),

            array(
                'id' => 'lay_a_quick_view',
                'type' => 'switch',
                'title' => esc_html__( 'Enable quick view', 'vlog' ),
                'subtitle' => esc_html__( 'If the post is a video, clicking on the thumbnail will play the video in popup', 'vlog' ),
                'default' => false
            ),

            array(
                'id' => 'lay_a_special_tag',
                'type' => 'switch',
                'title' => esc_html__( 'Display special tag label', 'vlog' ),
                'subtitle' => esc_html__( 'Note: You must define your special tag in Theme Options -> Misc.', 'vlog' ),
                'default' => true
            ),


            array(
                'id'        => 'img_size_lay_a_ratio',
                'type'      => 'radio',
                'title'     => esc_html__( 'Layout A image ratio', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose an image ratio for Layout A', 'vlog' ),
                'options'   => vlog_get_image_ratio_opts(),
                'default'   => '16_9',
            ),

            array(
                'id'        => 'img_size_lay_a_custom',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => esc_html__( 'Layout A image custom ratio', 'vlog' ),
                'subtitle'  => esc_html__( 'Specify your custom ratio for Layout A images', 'vlog' ),
                'desc'      => esc_html__( 'Note: put 3:4 or 2:1 or any custom ratio you want', 'vlog' ),
                'default'   => '',
                'required'  => array( 'img_size_lay_a_ratio', '=', 'custom' ),
            ),

        ) ) );

/* Layout B */
Redux::setSection( $opt_name , array(
        'icon'      => '',
        'title'     => esc_html__( 'Layout B', 'vlog' ),
        'heading' => false,
        'subsection' => true,
        'fields'    => array(

            array(
                'id'        => 'section_layout_b',
                'type'      => 'section',
                'title'     => '<img src="'.esc_url( get_template_directory_uri().'/assets/img/admin/layout_b.png' ).'"/>'.esc_html__( 'Layout B', 'vlog' ),
                'subtitle'  => esc_html__( 'Manage options for posts displayed in Layout B', 'vlog' ),
                'indent' => false
            ),

            array(
                'id' => 'lay_b_cat',
                'type' => 'switch',
                'title' => esc_html__( 'Display category', 'vlog' ),
                'subtitle' => esc_html__( 'Check if you want to display a category link for posts in Layout B', 'vlog' ),
                'default' => true
            ),

            array(
                'id' => 'lay_b_serie',
                'type' => 'switch',
                'title' => esc_html__( 'Display Serie', 'vlog' ),
                'subtitle' => esc_html__( 'Check if you want to display a serie link for posts in Layout B', 'vlog' ),
                'default' => false
            ),

            array(
                'id'        => 'lay_b_meta',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => esc_html__( 'Meta data', 'vlog' ),
                'subtitle'  => esc_html__( 'Check which meta data to show for posts in Layout B', 'vlog' ),
                'options'   => vlog_get_meta_opts(),
                'default' => vlog_get_meta_opts( array( 'date', 'comments' ) )
            ),

            array(
                'id' => 'lay_b_excerpt',
                'type' => 'switch',
                'title' => esc_html__( 'Layout B excerpt', 'vlog' ),
                'subtitle' => esc_html__( 'Check if you want to show a text excerpt for posts in Layout B', 'vlog' ),
                'default' => true
            ),

            array(
                'id' => 'lay_b_excerpt_limit',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'Excerpt limit', 'vlog' ),
                'subtitle' => esc_html__( 'Specify your excerpt limit', 'vlog' ),
                'desc' => esc_html__( 'Note: Value represents number of characters', 'vlog' ),
                'default' => '170',
                'validate' => 'numeric',
                'required'  => array( 'lay_b_excerpt', '=', true )
            ),

            array(
                'id' => 'lay_b_rm',
                'type' => 'switch',
                'title' => esc_html__( 'Read more button', 'vlog' ),
                'subtitle' => esc_html__( 'Display read more button for layout B', 'vlog' ),
                'default' => false,
            ),

            array(
                'id' => 'lay_b_format_label',
                'type' => 'switch',
                'title' => esc_html__( 'Display post format label', 'vlog' ),
                'default' => true
            ),
	
	        array(
		        'id' => 'lay_b_quick_view',
		        'type' => 'switch',
		        'title' => esc_html__( 'Enable quick view', 'vlog' ),
		        'subtitle' => esc_html__( 'If the post is a video, clicking on the thumbnail will play the video in popup', 'vlog' ),
		        'default' => false
	        ),

            array(
                'id' => 'lay_b_special_tag',
                'type' => 'switch',
                'title' => esc_html__( 'Display special tag label', 'vlog' ),
                'subtitle' => esc_html__( 'Note: You must define your special tag in Theme Options -> Misc.', 'vlog' ),
                'default' => true
            ),


            array(
                'id'        => 'img_size_lay_b_ratio',
                'type'      => 'radio',
                'title'     => esc_html__( 'Layout B image ratio', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose an image ratio for Layout B', 'vlog' ),
                'options'   => vlog_get_image_ratio_opts(),
                'default'   => '16_9',
            ),

            array(
                'id'        => 'img_size_lay_b_custom',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => esc_html__( 'Layout B image custom ratio', 'vlog' ),
                'subtitle'  => esc_html__( 'Specify your custom ratio for Layout B images', 'vlog' ),
                'desc'      => esc_html__( 'Note: put 3:4 or 2:1 or any custom ratio you want', 'vlog' ),
                'default'   => '',
                'required'  => array( 'img_size_lay_b_ratio', '=', 'custom' ),
            ),

        ) ) );




/* Layout C */
Redux::setSection( $opt_name , array(
        'icon'      => '',
        'title'     => esc_html__( 'Layout C', 'vlog' ),
        'heading' => false,
        'subsection' => true,
        'fields'    => array(

            array(
                'id'        => 'section_layout_c',
                'type'      => 'section',
                'title'     => '<img src="'.esc_url( get_template_directory_uri().'/assets/img/admin/layout_c.png' ).'"/>'.esc_html__( 'Layout C', 'vlog' ),
                'subtitle'  => esc_html__( 'Manage options for posts displayed in Layout C', 'vlog' ),
                'indent'   => false
            ),

            array(
                'id' => 'lay_c_cat',
                'type' => 'switch',
                'title' => esc_html__( 'Display category', 'vlog' ),
                'subtitle' => esc_html__( 'Check if you want to display a category link for posts in Layout C', 'vlog' ),
                'default' => true
            ),

            array(
                'id' => 'lay_c_serie',
                'type' => 'switch',
                'title' => esc_html__( 'Display Serie', 'vlog' ),
                'subtitle' => esc_html__( 'Check if you want to display a serie link for posts in Layout C', 'vlog' ),
                'default' => false
            ),

            array(
                'id'        => 'lay_c_meta',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => esc_html__( 'Meta data', 'vlog' ),
                'subtitle'  => esc_html__( 'Check which meta data to show for posts in Layout C', 'vlog' ),
                'options'   => vlog_get_meta_opts(),
                'default' => vlog_get_meta_opts( array( 'author', 'date' ) )
            ),

            array(
                'id' => 'lay_c_excerpt',
                'type' => 'switch',
                'title' => esc_html__( 'Layout C excerpt', 'vlog' ),
                'subtitle' => esc_html__( 'Check if you want to show a text excerpt for posts in Layout C', 'vlog' ),
                'default' => true
            ),


            array(
                'id' => 'lay_c_excerpt_limit',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'Excerpt limit', 'vlog' ),
                'subtitle' => esc_html__( 'Specify your excerpt limit', 'vlog' ),
                'desc' => esc_html__( 'Note: Value represents number of characters', 'vlog' ),
                'default' => '150',
                'validate' => 'numeric',
                'required'  => array( 'lay_c_excerpt', '=', true )
            ),
	
	        array(
		        'id' => 'lay_c_quick_view',
		        'type' => 'switch',
		        'title' => esc_html__( 'Enable quick view', 'vlog' ),
		        'subtitle' => esc_html__( 'If the post is a video, clicking on the thumbnail will play the video in popup', 'vlog' ),
		        'default' => false
	        ),

            array(
                'id' => 'lay_c_rm',
                'type' => 'switch',
                'title' => esc_html__( 'Read more button', 'vlog' ),
                'subtitle' => esc_html__( 'Display read more button for layout C', 'vlog' ),
                'default' => false,
            ),

            array(
                'id' => 'lay_c_format_label',
                'type' => 'switch',
                'title' => esc_html__( 'Display post format label', 'vlog' ),
                'default' => true
            ),

            array(
                'id' => 'lay_c_special_tag',
                'type' => 'switch',
                'title' => esc_html__( 'Display special tag label', 'vlog' ),
                'subtitle' => esc_html__( 'Note: You must define your special tag in Theme Options -> Misc.', 'vlog' ),
                'default' => true
            ),


            array(
                'id'        => 'img_size_lay_c_ratio',
                'type'      => 'radio',
                'title'     => esc_html__( 'Layout C image ratio', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose an image ratio for Layout C', 'vlog' ),
                'options'   => vlog_get_image_ratio_opts(),
                'default'   => '16_9',
            ),

            array(
                'id'        => 'img_size_lay_c_custom',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => esc_html__( 'Layout C image custom ratio', 'vlog' ),
                'subtitle'  => esc_html__( 'Specify your custom ratio for Layout C images', 'vlog' ),
                'desc'      => esc_html__( 'Note: put 3:4 or 2:1 or any custom ratio you want', 'vlog' ),
                'default'   => '',
                'required'  => array( 'img_size_lay_c_ratio', '=', 'custom' ),
            ),

        ) ) );


/* Layout D */
Redux::setSection( $opt_name , array(
        'icon'      => '',
        'title'     => esc_html__( 'Layout D', 'vlog' ),
        'heading' => false,
        'subsection' => true,
        'fields'    => array(

            array(
                'id'        => 'section_layout_d',
                'type'      => 'section',
                'title'     => '<img src="'.esc_url( get_template_directory_uri().'/assets/img/admin/layout_d.png' ).'"/>'.esc_html__( 'Layout D', 'vlog' ),
                'subtitle'  => esc_html__( 'Manage options for posts displayed in Layout D', 'vlog' ),
                'indent'   => false
            ),

            array(
                'id' => 'lay_d_cat',
                'type' => 'switch',
                'title' => esc_html__( 'Display category', 'vlog' ),
                'subtitle' => esc_html__( 'Check if you want to display a category link for posts in Layout D', 'vlog' ),
                'default' => true
            ),

            array(
                'id' => 'lay_d_serie',
                'type' => 'switch',
                'title' => esc_html__( 'Display Serie', 'vlog' ),
                'subtitle' => esc_html__( 'Check if you want to display a serie link for posts in Layout D', 'vlog' ),
                'default' => false
            ),

            array(
                'id'        => 'lay_d_meta',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => esc_html__( 'Meta data', 'vlog' ),
                'subtitle'  => esc_html__( 'Check which meta data to show for posts in Layout D', 'vlog' ),
                'options'   => vlog_get_meta_opts(),
                'default' => vlog_get_meta_opts( array( 'none' ) )
            ),

            array(
                'id' => 'lay_d_excerpt',
                'type' => 'switch',
                'title' => esc_html__( 'Layout D excerpt', 'vlog' ),
                'subtitle' => esc_html__( 'Check if you want to show a text excerpt for posts in Layout D', 'vlog' ),
                'default' => false
            ),


            array(
                'id' => 'lay_d_excerpt_limit',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'Excerpt limit', 'vlog' ),
                'subtitle' => esc_html__( 'Specify your excerpt limit', 'vlog' ),
                'desc' => esc_html__( 'Note: Value represents number of characters', 'vlog' ),
                'default' => '100',
                'validate' => 'numeric',
                'required'  => array( 'lay_d_excerpt', '=', true )
            ),

            array(
                'id' => 'lay_d_format_label',
                'type' => 'switch',
                'title' => esc_html__( 'Display post format label', 'vlog' ),
                'default' => true
            ),
	
	        array(
		        'id' => 'lay_d_quick_view',
		        'type' => 'switch',
		        'title' => esc_html__( 'Enable quick view', 'vlog' ),
		        'subtitle' => esc_html__( 'If the post is a video, clicking on the thumbnail will play the video in popup', 'vlog' ),
		        'default' => false
	        ),

            array(
                'id' => 'lay_d_special_tag',
                'type' => 'switch',
                'title' => esc_html__( 'Display special tag label', 'vlog' ),
                'subtitle' => esc_html__( 'Note: You must define your special tag in Theme Options -> Misc.', 'vlog' ),
                'default' => true
            ),

            array(
                'id'        => 'img_size_lay_d_ratio',
                'type'      => 'radio',
                'title'     => esc_html__( 'Layout D image ratio', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose an image ratio for Layout D', 'vlog' ),
                'options'   => vlog_get_image_ratio_opts(),
                'default'   => '16_9',
            ),

            array(
                'id'        => 'img_size_lay_d_custom',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => esc_html__( 'Layout D image custom ratio', 'vlog' ),
                'subtitle'  => esc_html__( 'Specify your custom ratio for Layout D images', 'vlog' ),
                'desc'      => esc_html__( 'Note: put 3:4 or 2:1 or any custom ratio you want', 'vlog' ),
                'default'   => '',
                'required'  => array( 'img_size_lay_d_ratio', '=', 'custom' ),
            ),

        ) ) );


/* Layout E */
Redux::setSection( $opt_name , array(
        'icon'      => '',
        'title'     => esc_html__( 'Layout E', 'vlog' ),
        'heading' => false,
        'subsection' => true,
        'fields'    => array(

            array(
                'id'        => 'section_layout_e',
                'type'      => 'section',
                'title'     => '<img src="'.esc_url( get_template_directory_uri().'/assets/img/admin/layout_e.png' ).'"/>'.esc_html__( 'Layout E', 'vlog' ),
                'subtitle'  => esc_html__( 'Manage options for posts displayed in Layout E', 'vlog' ),
                'indent'   => false
            ),

            array(
                'id' => 'lay_e_cat',
                'type' => 'switch',
                'title' => esc_html__( 'Display category', 'vlog' ),
                'subtitle' => esc_html__( 'Check if you want to display a category link for posts in Layout E', 'vlog' ),
                'default' => true
            ),

            array(
                'id' => 'lay_e_serie',
                'type' => 'switch',
                'title' => esc_html__( 'Display Serie', 'vlog' ),
                'subtitle' => esc_html__( 'Check if you want to display a serie link for posts in Layout E', 'vlog' ),
                'default' => false
            ),

            array(
                'id'        => 'lay_e_meta',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => esc_html__( 'Meta data', 'vlog' ),
                'subtitle'  => esc_html__( 'Check which meta data to show for posts in Layout E', 'vlog' ),
                'options'   => vlog_get_meta_opts(),
                'default' => vlog_get_meta_opts( array( 'views', 'rtime' ) )
            ),

            array(
                'id' => 'lay_e_excerpt',
                'type' => 'switch',
                'title' => esc_html__( 'Layout E excerpt', 'vlog' ),
                'subtitle' => esc_html__( 'Check if you want to show a text excerpt for posts in Layout E', 'vlog' ),
                'default' => false
            ),


            array(
                'id' => 'lay_e_excerpt_limit',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'Excerpt limit', 'vlog' ),
                'subtitle' => esc_html__( 'Specify your excerpt limit', 'vlog' ),
                'desc' => esc_html__( 'Note: Value represents number of characters', 'vlog' ),
                'default' => '150',
                'validate' => 'numeric',
                'required'  => array( 'lay_e_excerpt', '=', true )
            ),

            array(
                'id' => 'lay_e_format_label',
                'type' => 'switch',
                'title' => esc_html__( 'Display post format label', 'vlog' ),
                'default' => true
            ),
	
	        array(
		        'id' => 'lay_e_quick_view',
		        'type' => 'switch',
		        'title' => esc_html__( 'Enable quick view', 'vlog' ),
		        'subtitle' => esc_html__( 'If the post is a video, clicking on the thumbnail will play the video in popup', 'vlog' ),
		        'default' => false
	        ),

             array(
                'id' => 'lay_e_special_tag',
                'type' => 'switch',
                'title' => esc_html__( 'Display special tag label', 'vlog' ),
                'subtitle' => esc_html__( 'Note: You must define your special tag in Theme Options -> Misc.', 'vlog' ),
                'default' => true
            ),

            array(
                'id'        => 'img_size_lay_e_ratio',
                'type'      => 'radio',
                'title'     => esc_html__( 'Layout D image ratio', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose an image ratio for Layout D', 'vlog' ),
                'options'   => vlog_get_image_ratio_opts(),
                'default'   => '16_9',
            ),

            array(
                'id'        => 'img_size_lay_e_custom',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => esc_html__( 'Layout E image custom ratio', 'vlog' ),
                'subtitle'  => esc_html__( 'Specify your custom ratio for Layout E images', 'vlog' ),
                'desc'      => esc_html__( 'Note: put 3:4 or 2:1 or any custom ratio you want', 'vlog' ),
                'default'   => '',
                'required'  => array( 'img_size_lay_e_ratio', '=', 'custom' ),
            ),

        ) ) );

/* Layout F */
Redux::setSection( $opt_name , array(
        'icon'      => '',
        'title'     => esc_html__( 'Layout F', 'vlog' ),
        'heading' => false,
        'subsection' => true,
        'fields'    => array(

            array(
                'id'        => 'section_layout_f',
                'type'      => 'section',
                'title'     => '<img src="'.esc_url( get_template_directory_uri().'/assets/img/admin/layout_f.png' ).'"/>'.esc_html__( 'Layout F', 'vlog' ),
                'subtitle'  => esc_html__( 'Manage options for posts displayed in Layout F', 'vlog' ),
                'indent'   => false
            ),

            array(
                'id' => 'lay_f_cat',
                'type' => 'switch',
                'title' => esc_html__( 'Display category', 'vlog' ),
                'subtitle' => esc_html__( 'Check if you want to display a category link for posts in Layout F', 'vlog' ),
                'default' => false
            ),

            array(
                'id' => 'lay_f_serie',
                'type' => 'switch',
                'title' => esc_html__( 'Display Serie', 'vlog' ),
                'subtitle' => esc_html__( 'Check if you want to display a serie link for posts in Layout F', 'vlog' ),
                'default' => false
            ),

            array(
                'id'        => 'lay_f_meta',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => esc_html__( 'Meta data', 'vlog' ),
                'subtitle'  => esc_html__( 'Check which meta data to show for posts in Layout F', 'vlog' ),
                'options'   => vlog_get_meta_opts(),
                'default' => vlog_get_meta_opts( array( 'date' ) )
            ),
	
	        array(
		        'id' => 'lay_f_quick_view',
		        'type' => 'switch',
		        'title' => esc_html__( 'Enable quick view', 'vlog' ),
		        'subtitle' => esc_html__( 'If the post is a video, clicking on the thumbnail will play the video in popup', 'vlog' ),
		        'default' => false
	        ),

            array(
                'id'        => 'img_size_lay_f_ratio',
                'type'      => 'radio',
                'title'     => esc_html__( 'Layout F image ratio', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose an image ratio for Layout F', 'vlog' ),
                'options'   => vlog_get_image_ratio_opts(),
                'default'   => '3_2',
            ),

            array(
                'id'        => 'img_size_lay_f_custom',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => esc_html__( 'Layout F image custom ratio', 'vlog' ),
                'subtitle'  => esc_html__( 'Specify your custom ratio for Layout F images', 'vlog' ),
                'desc'      => esc_html__( 'Note: put 3:4 or 2:1 or any custom ratio you want', 'vlog' ),
                'default'   => '',
                'required'  => array( 'img_size_lay_f_ratio', '=', 'custom' ),
            ),

        ) ) );


/* Layout G */
Redux::setSection( $opt_name , array(
        'icon'      => '',
        'title'     => esc_html__( 'Layout G', 'vlog' ),
        'heading' => false,
        'subsection' => true,
        'fields'    => array(

            array(
                'id'        => 'section_layout_g',
                'type'      => 'section',
                'title'     => '<img src="'.esc_url( get_template_directory_uri().'/assets/img/admin/layout_g.png' ).'"/>'.esc_html__( 'Layout G', 'vlog' ),
                'subtitle'  => esc_html__( 'Manage options for posts displayed in Layout G', 'vlog' ),
                'indent'   => false
            ),

            array(
                'id' => 'lay_g_cat',
                'type' => 'switch',
                'title' => esc_html__( 'Display category', 'vlog' ),
                'subtitle' => esc_html__( 'Check if you want to display a category link for posts in Layout G', 'vlog' ),
                'default' => true
            ),

            array(
                'id' => 'lay_g_serie',
                'type' => 'switch',
                'title' => esc_html__( 'Display Serie', 'vlog' ),
                'subtitle' => esc_html__( 'Check if you want to display a serie link for posts in Layout G', 'vlog' ),
                'default' => false
            ),

            array(
                'id'        => 'lay_g_meta',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => esc_html__( 'Meta data', 'vlog' ),
                'subtitle'  => esc_html__( 'Check which meta data to show for posts in Layout G', 'vlog' ),
                'options'   => vlog_get_meta_opts(),
                'default' => vlog_get_meta_opts( array( 'none' ) )
            ),

            array(
                'id' => 'lay_g_format_label',
                'type' => 'switch',
                'title' => esc_html__( 'Display post format label', 'vlog' ),
                'default' => true
            ),
	
	        array(
		        'id' => 'lay_g_quick_view',
		        'type' => 'switch',
		        'title' => esc_html__( 'Enable quick view', 'vlog' ),
		        'subtitle' => esc_html__( 'If the post is a video, clicking on the thumbnail will play the video in popup', 'vlog' ),
		        'default' => false
	        ),

             array(
                'id' => 'lay_g_special_tag',
                'type' => 'switch',
                'title' => esc_html__( 'Display special tag label', 'vlog' ),
                'subtitle' => esc_html__( 'Note: You must define your special tag in Theme Options -> Misc.', 'vlog' ),
                'default' => true
            ),

            array(
                'id'        => 'img_size_lay_g_ratio',
                'type'      => 'radio',
                'title'     => esc_html__( 'Layout G image ratio', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose an image ratio for Layout G', 'vlog' ),
                'options'   => vlog_get_image_ratio_opts(),
                'default'   => '16_9',
            ),

            array(
                'id'        => 'img_size_lay_g_custom',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => esc_html__( 'Layout G image custom ratio', 'vlog' ),
                'subtitle'  => esc_html__( 'Specify your custom ratio for Layout G images', 'vlog' ),
                'desc'      => esc_html__( 'Note: put 3:4 or 2:1 or any custom ratio you want', 'vlog' ),
                'default'   => '',
                'required'  => array( 'img_size_lay_g_ratio', '=', 'custom' ),
            ),

        ) ) );


/* Layout H */
Redux::setSection( $opt_name , array(
        'icon'      => '',
        'title'     => esc_html__( 'Layout H', 'vlog' ),
        'heading' => false,
        'subsection' => true,
        'fields'    => array(

            array(
                'id'        => 'section_layout_h',
                'type'      => 'section',
                'title'     => '<img src="'.esc_url( get_template_directory_uri().'/assets/img/admin/layout_h.png' ).'"/>'.esc_html__( 'Layout H', 'vlog' ),
                'subtitle'  => esc_html__( 'Manage options for posts displayed in Layout H', 'vlog' ),
                'indent'   => false
            ),

            array(
                'id' => 'lay_h_cat',
                'type' => 'switch',
                'title' => esc_html__( 'Display category', 'vlog' ),
                'subtitle' => esc_html__( 'Check if you want to display a category link for posts in Layout H', 'vlog' ),
                'default' => false
            ),

            array(
                'id' => 'lay_h_serie',
                'type' => 'switch',
                'title' => esc_html__( 'Display Serie', 'vlog' ),
                'subtitle' => esc_html__( 'Check if you want to display a serie link for posts in Layout H', 'vlog' ),
                'default' => false
            ),

            array(
                'id'        => 'lay_h_meta',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => esc_html__( 'Meta data', 'vlog' ),
                'subtitle'  => esc_html__( 'Check which meta data to show for posts in Layout H', 'vlog' ),
                'options'   => vlog_get_meta_opts(),
                'default' => vlog_get_meta_opts( array( 'none' ) )
            ),
	
	        array(
		        'id' => 'lay_h_quick_view',
		        'type' => 'switch',
		        'title' => esc_html__( 'Enable quick view', 'vlog' ),
		        'subtitle' => esc_html__( 'If the post is a video, clicking on the thumbnail will play the video in popup', 'vlog' ),
		        'default' => false
	        ),

            array(
                'id'        => 'img_size_lay_h_ratio',
                'type'      => 'radio',
                'title'     => esc_html__( 'Layout H image ratio', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose an image ratio for Layout G', 'vlog' ),
                'options'   => vlog_get_image_ratio_opts(),
                'default'   => '3_2',
            ),

            array(
                'id'        => 'img_size_lay_h_custom',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => esc_html__( 'Layout H image custom ratio', 'vlog' ),
                'subtitle'  => esc_html__( 'Specify your custom ratio for Layout H images', 'vlog' ),
                'desc'      => esc_html__( 'Note: put 3:4 or 2:1 or any custom ratio you want', 'vlog' ),
                'default'   => '',
                'required'  => array( 'img_size_lay_h_ratio', '=', 'custom' ),
            ),


        ) ) );


/* Single Post */
Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-pencil',
        'title'     => esc_html__( 'Single Post', 'vlog' ),
        'heading' => false,
        'fields'    => array(
        ) )
);

/* Single - Layout */
Redux::setSection( $opt_name , array(
        'icon'      => '',
        'title'     => esc_html__( 'General', 'vlog' ),
        'heading' => false,
        'subsection' => true,
        'fields'    => array(


            array(
                'id'        => 'single_fa_layout',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Default layout', 'vlog' ),
                'subtitle'  => esc_html__( 'Chose a default layout for your single posts', 'vlog' ),
                'desc' => esc_html__( 'Note: You can override this option for each particular post', 'vlog' ),
                'options'   => vlog_get_single_layouts(),
                'default'   => 1,
            ),

            array(
                'id'        => 'single_use_sidebar',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Display sidebar', 'vlog' ),
                'desc' => esc_html__( 'Note: You can override this option for each particular post', 'vlog' ),
                'options'   => vlog_get_sidebar_layouts(),
                'default'   => 'right'
            ),

            array(
                'id'        => 'single_sidebar',
                'type'      => 'select',
                'title'     => esc_html__( 'Post standard sidebar', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose a single post standard sidebar', 'vlog' ),
                'options'   => vlog_get_sidebars_list(),
                'default'   => 'vlog_default_sidebar',
                'required'  => array( 'single_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'single_sticky_sidebar',
                'type'      => 'select',
                'title'     => esc_html__( 'Post sticky sidebar', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose a single post sticky sidebar', 'vlog' ),
                'options'   => vlog_get_sidebars_list(),
                'default'   => 'vlog_default_sticky_sidebar',
                'required'  => array( 'single_use_sidebar', '!=', 'none' )
            ),

             array(
                'id' => 'single_cat',
                'type' => 'switch',
                'title' => esc_html__( 'Display category link', 'vlog' ),
                'subtitle' => esc_html__( 'Check if you want to display a category link', 'vlog' ),
                'default' => true,
            ),

            array(
                'id' => 'single_cat',
                'type' => 'switch',
                'title' => esc_html__( 'Display category link', 'vlog' ),
                'subtitle' => esc_html__( 'Check if you want to display a category link', 'vlog' ),
                'default' => true,
            ),

            array(
                'id' => 'single_serie',
                'type' => 'switch',
                'title' => esc_html__( 'Display serie link', 'vlog' ),
                'subtitle' => esc_html__( 'Check if you want to display a serie link', 'vlog' ),
                'default' => false,
            ),

            array(
                'id'        => 'lay_single_meta',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => esc_html__( 'Meta data', 'vlog' ),
                'subtitle'  => esc_html__( 'Check which meta data to show for single posts', 'vlog' ),
                'options'   => vlog_get_meta_opts(),
                'default' => vlog_get_meta_opts( array( 'date', 'views', 'rtime' ) ),
            ),

            array(
                'id'        => 'lay_single_actions',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => esc_html__( 'Actions', 'vlog' ),
                'subtitle'      => esc_html__( 'Watch later, Cinema mode and Subscribe are available for video post format only. Listen later is available for audio post format only.', 'vlog' ),
                'desc' => esc_html__( 'Note: if you are using subscribe button, you must specify the URL in Theme Options -> Misc.', 'vlog' ),
                'options'   => vlog_get_action_opts(),
                'default' => vlog_get_action_opts( array( 'comments', 'watch-later', 'cinema-mode' ) ),
            ),

            array(
                'id' => 'single_share',
                'type' => 'radio',
                'title' => esc_html__( 'Display share buttons', 'vlog' ),
                'subtitle' => esc_html__( 'Check where do you want to display share buttons', 'vlog' ),
                'options' => array(
                    'above' =>  esc_html__( 'Above content', 'vlog' ),
                    'below' =>  esc_html__( 'Below content', 'vlog' ),
                    'abovebelow' =>  esc_html__( 'Above and below content', 'vlog' ),
                    'none' => esc_html__( 'Do not display', 'vlog' )
                ),
                'default' => 'above'
            ),

            array(
                'id' => 'single_headline',
                'type' => 'switch',
                'title' => esc_html__( 'Display headline (excerpt)', 'vlog' ),
                'subtitle' => esc_html__( 'Check if you want to display post excerpt at the beginning of post', 'vlog' ),
                'default' => true,
            ),

            array(
                'id' => 'single_tags',
                'type' => 'switch',
                'title' => esc_html__( 'Display tags', 'vlog' ),
                'subtitle' => esc_html__( 'Check if you want to display tags below the post content', 'vlog' ),
                'default' => true
            ),

            array(
                'id' => 'single_prev_next',
                'type' => 'radio',
                'title' => esc_html__( 'Display prev/next posts', 'vlog' ),
                'subtitle' => esc_html__( 'Check where do you want to display previous/next post links', 'vlog' ),
                'options' => array(
                    'cover' =>  esc_html__( 'In cover area', 'vlog' ),
                    'below' =>  esc_html__( 'Below content', 'vlog' ),
                    'coverbelow' =>  esc_html__( 'Both in cover area and below content', 'vlog' ),
                    'none' => esc_html__( 'Do not display', 'vlog' )
                ),
                'default' => 'cover'
            ),

           array(
                'id' => 'ignore_category_prev_next',
                'type' => 'checkbox',
                'title' => esc_html__( 'Ignore category when pulling prev/next posts', 'vlog' ),
                'subtitle' => esc_html__( 'Use this option to avoid selecting previous/next posts from the same category as the current post', 'vlog' ),
                'default' => false,
                'required'  => array( 'single_prev_next', '!=', 'none' ),
            ),

            array(
                'id' => 'single_author',
                'type' => 'switch',
                'title' => esc_html__( 'Display author area', 'vlog' ),
                'subtitle' => esc_html__( 'Check if you want to display the "about the author" area.', 'vlog' ),
                'default' => true
            ),

            array(
                'id' => 'single_fimg',
                'type' => 'switch',
                'title' => esc_html__( 'Display featured image', 'vlog' ),
                'subtitle' => esc_html__( 'Check if you want to display the featured image', 'vlog' ),
                'desc' => esc_html__( 'Note: this option will only apply for classic post layout (no cover)', 'vlog' ),
                'default' => true
            ),

            array(
                'id' => 'single_fimg_cap',
                'type' => 'switch',
                'title' => esc_html__( 'Display featured image caption', 'vlog' ),
                'subtitle' => esc_html__( 'Check if you want to display a caption/description on the featured image', 'vlog' ),
                'default' => true,
                'required'  => array( 'single_fimg', '=', true )
            ),

            array(
                'id' => 'single_related',
                'type' => 'switch',
                'title' => esc_html__( 'Display "related" posts box', 'vlog' ),
                'subtitle' => esc_html__( 'Choose if you want to display an additional area with related posts below the post content', 'vlog' ),
                'default' => true
            ),

            

            array(
                'id'        => 'related_layout',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Related posts layout', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose how to display your related posts', 'vlog' ),
                'options'   => vlog_get_main_layouts(),
                'default'   => 'e'
            ),


            array(
                'id'        => 'related_limit',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => esc_html__( 'Related area posts number limit', 'vlog' ),
                'default'   => 3,
                'validate'  => 'numeric',
                'required'  => array( 'single_related', '=', true ),
            ),

            array(
                'id' => 'related_by_series',
                'type' => 'checkbox',
                'title' => esc_html__( 'Check related posts from series first', 'vlog' ),
                'subtitle' => esc_html__( 'If this option is checked and a post belongs to a serie, it will pull related posts from that serie ignoring the options below', 'vlog' ),
                'default' => true
            ),
            
            array(
                'id'        => 'related_type',
                'type'      => 'radio',
                'title'     => esc_html__( 'Related area chooses from posts', 'vlog' ),
                'options'   => array(
                    'cat' => esc_html__( 'Located in the same category', 'vlog' ),
                    'tag' => esc_html__( 'Tagged with at least one same tag', 'vlog' ),
                    'cat_or_tag' => esc_html__( 'Located in the same category OR tagged with a same tag', 'vlog' ),
                    'cat_and_tag' => esc_html__( 'Located in the same category AND tagged with a same tag', 'vlog' ),
                    'author' => esc_html__( 'By the same author', 'vlog' ),
                    '0' => esc_html__( 'All posts', 'vlog' )
                ),
                'default'   => 'cat',
                'required'  => array( 'single_related', '=', true ),
            ),

            array(
                'id' => 'related_video_by_post_format',
                'type' => 'checkbox',
                'title' => esc_html__( 'Check related posts from current post format only', 'vlog' ),
                'subtitle' => esc_html__( 'If this option is checked you will get related posts from current post format only', 'vlog' ),
                'default' => false,
                'required'  => array( 'single_related', '=', true ),
            ),

            array(
                'id'        => 'related_order',
                'type'      => 'radio',
                'title'     => esc_html__( 'Related posts are ordered by', 'vlog' ),
                'options'   => vlog_get_post_order_opts(),
                'default'   => 'date',
                'required'  => array( 'single_related', '=', true ),
            ),

            array(
                'id'        => 'related_time',
                'type'      => 'radio',
                'title'     => esc_html__( 'Related posts are not older than', 'vlog' ),
                'options'   => vlog_get_time_diff_opts(),
                'default'   => '0',
                'required'  => array( 'single_related', '=', true ),
            )


        ) )
);

/* Single - Video */
Redux::setSection( $opt_name , array(
        'icon'      => '',
        'title'     => esc_html__( 'Video', 'vlog' ),
        'desc'     => esc_html__( 'These options apply to Video post format', 'vlog' ),
        'subsection' => true,
        'fields'    => array(

            array(
                'id'        => 'single_video_layout_switch',
                'type'      => 'switch',
                'title'     => esc_html__( 'Use different layout for video posts', 'vlog' ),
                'subtitle'  => esc_html__( 'Check if you want to use a different layout than the one you are using for "standard" posts', 'vlog' ),
                'default'   => false,
            ),
            
            array(
                'id'        => 'single_video_layout',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Video post layout', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose a default layout for your video posts', 'vlog' ),
                'options'   => vlog_get_single_layouts( false ),
                'required'  => array( 'single_video_layout_switch', '!=', false ),
                'default'   => 1,
            ),

            array(
                'id' => 'autodetect_video',
                'type' => 'switch',
                'title' => esc_html__( 'Auto-detect video', 'vlog' ),
                'subtitle' => esc_html__( 'If a standard post has a video included in content it will be automatically recognized and displayed as a video post', 'vlog' ),
                'default' => true
            ),

            array(
                'id' => 'open_videos_inplay',
                'type' => 'switch',
                'title' => esc_html__( 'Always display cover video in "play mode"', 'vlog' ),
                'subtitle' => esc_html__( 'Video will be automatically loaded on the screen in cover area, without the cover image and play button', 'vlog' ),
                'default' => false
            ),

            array(
                'id' => 'video_sticky',
                'type' => 'switch',
                'title' => esc_html__( 'Enable sticky video', 'vlog' ),
                'subtitle' => esc_html__( 'Stick the playing video to the side of the screen while scrolling through the post', 'vlog' ),
                'default' => false
            ),

        
            array(
                'id' => 'display_playlist_mode',
                'type' => 'switch',
                'title' => esc_html__( 'Display related videos playlist in cover area "play mode"', 'vlog' ),
                'subtitle' => esc_html__( 'Display a playlist of related posts in cover area', 'vlog' ),
                'default' => false
            ),

            array(
                'id'        => 'related_video_limit',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => esc_html__( 'Related videos limit', 'vlog' ),
                'default'   => 5,
                'validate'  => 'numeric',
                'required'  => array( 'display_playlist_mode', '=', true ),
            ),

            array(
                'id' => 'related_video_by_series',
                'type' => 'checkbox',
                'title' => esc_html__( 'Check related videos from series first', 'vlog' ),
                'subtitle' => esc_html__( 'If this option is checked and current video belongs to a serie, it will pull related videos from that serie ignoring the options below', 'vlog' ),
                'default' => true,
                'required'  => array( 'display_playlist_mode', '=', true ),
            ),
            
            array(
                'id'        => 'related_video_type',
                'type'      => 'radio',
                'title'     => esc_html__( 'Related video playlist chooses from videos', 'vlog' ),
                'options'   => array(
                    'cat' => esc_html__( 'Located in the same category', 'vlog' ),
                    'tag' => esc_html__( 'Tagged with at least one same tag', 'vlog' ),
                    'cat_or_tag' => esc_html__( 'Located in the same category OR tagged with a same tag', 'vlog' ),
                    'cat_and_tag' => esc_html__( 'Located in the same category AND tagged with a same tag', 'vlog' ),
                    'author' => esc_html__( 'By the same author', 'vlog' ),
                    '0' => esc_html__( 'All posts', 'vlog' )
                ),
                'default'   => 'cat',
                'required'  => array( 'display_playlist_mode', '=', true ),
            ),

            array(
                'id' => 'related_video_by_video_format',
                'type' => 'checkbox',
                'title' => esc_html__( 'Check video post format only', 'vlog' ),
                'subtitle' => esc_html__( 'If this option is checked you will get related videos from video post format only', 'vlog' ),
                'default' => false,
                'required'  => array( 'display_playlist_mode', '=', true ),
            ),

            array(
                'id'        => 'related_video_order',
                'type'      => 'radio',
                'title'     => esc_html__( 'Related videos are ordered by', 'vlog' ),
                'options'   => vlog_get_post_order_opts(),
                'default'   => 'date',
                'required'  => array( 'display_playlist_mode', '=', true ),
            ),

            array(
                'id'        => 'related_video_time',
                'type'      => 'radio',
                'title'     => esc_html__( 'Related videos are not older than', 'vlog' ),
                'options'   => vlog_get_time_diff_opts(),
                'default'   => '0',
                'required'  => array( 'display_playlist_mode', '=', true ),
            ),

            array(
                'id' => 'video_disable_related',
                'type' => 'checkbox',
                'title' => esc_html__( 'Disable 3rd party related videos when video is finished', 'vlog' ),
                'subtitle' => esc_html__( 'If you check this option, theme will try to automatically disable related videos after currently playing video is finished, i.e. YouTube suggested videos', 'vlog' ),
                'desc' => esc_html__( 'Note: This control is limited and may vary due to different video platforms', 'vlog' ),
                'default' => false
            ),

        ) )
);

/* Single - Audio */
Redux::setSection( $opt_name , array(
        'icon'      => '',
        'title'     => esc_html__( 'Audio', 'vlog' ),
        'heading' => false,
        'subsection' => true,
        'fields'    => array(

            array(
                'id' => 'autodetect_audio',
                'type' => 'switch',
                'title' => esc_html__( 'Auto-detect audio', 'vlog' ),
                'subtitle' => esc_html__( 'If a standard post has an audio included in content, it will be automatically recognized and displayed as Audio post', 'vlog' ),
                'default' => false
            ),

             array(
                'id' => 'open_audio_inplay',
                'type' => 'switch',
                'title' => esc_html__( 'Always display audio in play mode', 'vlog' ),
                'subtitle' => esc_html__( 'Audio posts will be automatically displayed on the screen in cover area, without cover image and play button', 'vlog' ),
                'default' => false
            )

        ) )
);


/* Page */
Redux::setSection( $opt_name ,  array(
        'icon'      => 'el-icon-file-edit',
        'title'     => esc_html__( 'Page', 'vlog' ),
        'desc'     => esc_html__( 'Manage default settings for your pages', 'vlog' ),
        'fields'    => array(

            array(
                'id'        => 'page_use_sidebar',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Display sidebar', 'vlog' ),
                'desc' => esc_html__( 'Note: You can override this option for each particular page', 'vlog' ),
                'options'   => vlog_get_sidebar_layouts(),
                'default'   => 'right'
            ),

            array(
                'id'        => 'page_sidebar',
                'type'      => 'select',
                'title'     => esc_html__( 'Page standard sidebar', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose a page standard sidebar', 'vlog' ),
                'options'   => vlog_get_sidebars_list(),
                'default'   => 'vlog_default_sidebar',
                'required'  => array( 'page_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'page_sticky_sidebar',
                'type'      => 'select',
                'title'     => esc_html__( 'Page sticky sidebar', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose a page sticky sidebar', 'vlog' ),
                'options'   => vlog_get_sidebars_list(),
                'default'   => 'vlog_default_sticky_sidebar',
                'required'  => array( 'page_use_sidebar', '!=', 'none' )
            ),

            array(
                'id' => 'page_fimg',
                'type' => 'switch',
                'title' => esc_html__( 'Display the featured image', 'vlog' ),
                'subtitle' => esc_html__( 'Choose if you want to display the featured image on single pages', 'vlog' ),
                'default' => true,
            ),

            array(
                'id' => 'page_fimg_cap',
                'type' => 'switch',
                'title' => esc_html__( 'Display the featured image caption', 'vlog' ),
                'subtitle' => esc_html__( 'Choose if you want to display the caption/description on the featured image', 'vlog' ),
                'default' => false,
                'required'  => array( 'page_fimg', '=', true )
            ),


            array(
                'id' => 'page_comments',
                'type' => 'switch',
                'title' => esc_html__( 'Display comments', 'vlog' ),
                'subtitle' => esc_html__( 'Choose if you want to display comments on pages', 'vlog' ),
                'description' => esc_html__( 'Note: This is just an option to quickly hide/display comments on pages. If you want to allow/disallow comments properly, you need to do it in the "Discussion" box for each particular page.', 'vlog' ),
                'default' => true
            )
        ) )
);

/* Categories */
Redux::setSection( $opt_name ,  array(
        'icon'      => 'el-icon-folder',
        'title'     => esc_html__( 'Category Template', 'vlog' ),
        'desc'     => esc_html__( 'Manage settings for the category templates.', 'vlog' ),
        'fields'    => array(


            array(
                'id'        => 'category_fa_layout',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Cover area layout', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose a default cover layout for categories', 'vlog' ),
                'options'   => vlog_get_featured_layouts( false, true, array('custom') ),
                'default'   => '1',

            ),

            array(
                'id'        => 'category_fa_limit',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => esc_html__( 'Number of cover area posts', 'vlog' ),
                'subtitle'  => esc_html__( 'Specify max number of posts to display in cover area', 'vlog' ),
                'default'   => 1,
                'required'  => array( 'category_fa_layout', '!=', 'none' ),
            ),

            array(
                'id'        => 'category_fa_order',
                'type'      => 'radio',
                'title'     => esc_html__( 'Cover area displays', 'vlog' ),
                'options'   => array(
                    'date' =>  esc_html__( 'Latest posts', 'vlog' ),
                    'comment_count' =>  esc_html__( 'Most commented posts', 'vlog' ),
                    'views' =>  esc_html__( 'Most viewed posts', 'vlog' ),
                ),
                'default'   => 'date',
                'required'  => array( 'category_fa_layout', '!=', 'none' ),
            ),

            array(
                'id'        => 'category_fa_unique',
                'type'      => 'switch',
                'title'     => esc_html__( 'Make cover posts unique', 'vlog' ),
                'subtitle'  => esc_html__( 'Do not duplicate cover posts and exclude them from main post listing below', 'vlog' ),
                'default'   => true,
                'required'  => array( 'category_fa_layout', '!=', 'none' ),
            ),

            array(
                'id'        => 'category_subnav',
                'type'      => 'switch',
                'title'     => esc_html__( 'Display child categories navigation', 'vlog' ),
                'subtitle'  => esc_html__( 'If the category has child categories, display its links', 'vlog' ),
                'default'   => false
            ),


            array(
                'id'        => 'category_layout',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Main layout', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose how to display your posts on category templates', 'vlog' ),
                'desc'  => esc_html__( 'Note: You can override this option for each category separately', 'vlog' ),
                'options'   => vlog_get_main_layouts(),
                'default'   => 'c',
            ),

            array(
                'id'        => 'category_ppp',
                'type'      => 'radio',
                'title'     => esc_html__( 'Posts per page', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose how many posts per page you want to display', 'vlog' ),
                'options'   => array(
                    'inherit' => wp_kses( sprintf( __( 'Inherit from global option in <a href="%s">Settings->Reading</a>', 'vlog' ), admin_url( 'options-general.php' ) ), wp_kses_allowed_html( 'post' ) ),
                    'custom' => esc_html__( 'Custom number', 'vlog' )
                ),
                'default'   => 'inherit'
            ),

            array(
                'id'        => 'category_ppp_num',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => esc_html__( 'Number of posts per page', 'vlog' ),
                'default'   => get_option( 'posts_per_page' ),
                'required'  => array( 'category_ppp', '=', 'custom' ),
                'validate'  => 'numeric'
            ),


            array(
                'id'        => 'category_starter_layout',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Starter layout', 'vlog' ),
                'subtitle'  => esc_html__( 'By choosing a starter layout, first "x" posts on the page will be displayed in this layout', 'vlog' ),
                'options'   => vlog_get_main_layouts( false, true ),
                'default'   => 'none',
            ),

            array(
                'id'        => 'category_starter_limit',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => esc_html__( 'Number of starter posts', 'vlog' ),
                'subtitle'  => esc_html__( 'Specify how many posts to display in "starter" layout', 'vlog' ),
                'default'   => 1,
                'required'  => array( 'category_starter_layout', '!=', 'none' ),
                'validate'  => 'numeric'
            ),

            array(
                'id'        => 'category_use_sidebar',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Display sidebar', 'vlog' ),
                'options'   => vlog_get_sidebar_layouts(),
                'default'   => 'right'
            ),

            array(
                'id'        => 'category_sidebar',
                'type'      => 'select',
                'title'     => esc_html__( 'Category standard sidebar', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose a standard category sidebar', 'vlog' ),
                'options'   => vlog_get_sidebars_list(),
                'default'   => 'vlog_default_sidebar',
                'required'  => array( 'category_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'category_sticky_sidebar',
                'type'      => 'select',
                'title'     => esc_html__( 'Category sticky sidebar', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose a sticky category sidebar', 'vlog' ),
                'options'   => vlog_get_sidebars_list(),
                'default'   => 'vlog_default_sticky_sidebar',
                'required'  => array( 'category_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'category_pag',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Pagination', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose a pagination type for category template', 'vlog' ),
                'desc'  => esc_html__( 'Note: You can override this option for each category separately', 'vlog' ),
                'options'   => vlog_get_pagination_layouts(),
                'default'   => 'numeric'
            )


        ) )
);

if(vlog_is_series_active()){

/* Series */
Redux::setSection( $opt_name ,  array(
        'icon'      => 'el-icon-indent-left',
        'title'     => esc_html__( 'Series Template', 'vlog' ),
        'heading'   => esc_html__( 'Series (Playlists) Template', 'vlog' ),
        'desc'     => esc_html__( 'Manage settings for the series (playlist) templates.', 'vlog' ),
        'fields'    => array(

            array(
                'id'        => 'serie_order_asc',
                'type'      => 'switch',
                'title'     => esc_html__( 'Display posts in ascending order', 'vlog' ),
                'subtitle'  => esc_html__( 'Check this option to order posts from oldest to latest', 'vlog' ),
                'default'   => true,
            ),

            array(
                'id'        => 'serie_fa_layout',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Cover area layout', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose a default cover layout for series', 'vlog' ),
                'options'   => vlog_get_featured_layouts( false, true, array('custom') ),
                'default'   => 1,

            ),

            array(
                'id'        => 'serie_fa_limit',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => esc_html__( 'Number of cover area posts', 'vlog' ),
                'subtitle'  => esc_html__( 'Specify max number of posts to display in cover area', 'vlog' ),
                'default'   => 1,
                'required'  => array( 'serie_fa_layout', '!=', 'none' ),
            ),

            array(
                'id'        => 'serie_layout',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Main layout', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose how to display your posts on series templates', 'vlog' ),
                'options'   => vlog_get_main_layouts(),
                'default'   => 'b',
            ),

            array(
                'id'        => 'serie_ppp',
                'type'      => 'radio',
                'title'     => esc_html__( 'Posts per page', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose how many posts per page you want to display', 'vlog' ),
                'options'   => array(
                    'inherit' => wp_kses( sprintf( __( 'Inherit from global option in <a href="%s">Settings->Reading</a>', 'vlog' ), admin_url( 'options-general.php' ) ), wp_kses_allowed_html( 'post' ) ),
                    'custom' => esc_html__( 'Custom number', 'vlog' )
                ),
                'default'   => 'inherit'
            ),

            array(
                'id'        => 'serie_ppp_num',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => esc_html__( 'Number of posts per page', 'vlog' ),
                'default'   => get_option( 'posts_per_page' ),
                'required'  => array( 'serie_ppp', '=', 'custom' ),
                'validate'  => 'numeric'
            ),


            array(
                'id'        => 'serie_starter_layout',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Starter layout', 'vlog' ),
                'subtitle'  => esc_html__( 'By choosing a starter layout, first "x" posts on the page will be displayed in this layout', 'vlog' ),
                'options'   => vlog_get_main_layouts( false, true ),
                'default'   => 'none',
            ),

            array(
                'id'        => 'serie_starter_limit',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => esc_html__( 'Number of starter posts', 'vlog' ),
                'subtitle'  => esc_html__( 'Specify how many posts to display in "starter" layout', 'vlog' ),
                'default'   => 1,
                'required'  => array( 'serie_starter_layout', '!=', 'none' ),
                'validate'  => 'numeric'
            ),

            array(
                'id'        => 'serie_use_sidebar',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Display sidebar', 'vlog' ),
                'options'   => vlog_get_sidebar_layouts(),
                'default'   => 'right'
            ),

            array(
                'id'        => 'serie_sidebar',
                'type'      => 'select',
                'title'     => esc_html__( 'Category standard sidebar', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose a standard serie sidebar', 'vlog' ),
                'options'   => vlog_get_sidebars_list(),
                'default'   => 'vlog_default_sidebar',
                'required'  => array( 'serie_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'serie_sticky_sidebar',
                'type'      => 'select',
                'title'     => esc_html__( 'Category sticky sidebar', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose a sticky serie sidebar', 'vlog' ),
                'options'   => vlog_get_sidebars_list(),
                'default'   => 'vlog_default_sticky_sidebar',
                'required'  => array( 'serie_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'serie_pag',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Pagination', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose a pagination type for serie template', 'vlog' ),
                'desc'  => esc_html__( 'Note: You can override this option for each serie separately', 'vlog' ),
                'options'   => vlog_get_pagination_layouts(),
                'default'   => 'numeric'
            )


        ) )
);

}

/* Tags */
Redux::setSection( $opt_name , array(
        'icon'      => ' el-icon-tag',
        'title'     => esc_html__( 'Tag Template', 'vlog' ),
        'desc'     => esc_html__( 'Manage settings for the tag templates', 'vlog' ),
        'fields'    => array(


            array(
                'id'        => 'tag_layout',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Main layout', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose how to display your posts on the tag template', 'vlog' ),
                'options'   => vlog_get_main_layouts(),
                'default'   => 'e'
            ),

            array(
                'id'        => 'tag_ppp',
                'type'      => 'radio',
                'title'     => esc_html__( 'Posts per page', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose how many posts per page you want to display', 'vlog' ),
                'options'   => array(
                    'inherit' => wp_kses( sprintf( __( 'Inherit from global option in <a href="%s">Settings->Reading</a>', 'vlog' ), admin_url( 'options-general.php' ) ), wp_kses_allowed_html( 'post' ) ),
                    'custom' => esc_html__( 'Custom number', 'vlog' )
                ),
                'default'   => 'inherit'
            ),

            array(
                'id'        => 'tag_ppp_num',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => esc_html__( 'Number of posts per page', 'vlog' ),
                'default'   => get_option( 'posts_per_page' ),
                'required'  => array( 'tag_ppp', '=', 'custom' ),
                'validate'  => 'numeric'
            ),


            array(
                'id'        => 'tag_starter_layout',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Starter layout', 'vlog' ),
                'subtitle'  => esc_html__( 'By choosing a starter layout, first "x" posts on the page will be displayed in this layout', 'vlog' ),
                'options'   => vlog_get_main_layouts( false, true ),
                'default'   => 'none',
            ),

            array(
                'id'        => 'tag_starter_limit',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => esc_html__( 'Number of starter posts', 'vlog' ),
                'subtitle'  => esc_html__( 'Specify how many posts to display in "starter" layout', 'vlog' ),
                'default'   => 1,
                'required'  => array( 'tag_starter_layout', '!=', 'none' ),
                'validate'  => 'numeric'
            ),


            array(
                'id'        => 'tag_use_sidebar',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Display sidebar', 'vlog' ),
                'options'   => vlog_get_sidebar_layouts(),
                'default'   => 'right'
            ),

            array(
                'id'        => 'tag_sidebar',
                'type'      => 'select',
                'title'     => esc_html__( 'Tag standard sidebar', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose a standard sidebar for the tag template', 'vlog' ),
                'options'   => vlog_get_sidebars_list(),
                'default'   => 'vlog_default_sidebar',
                'required'  => array( 'tag_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'tag_sticky_sidebar',
                'type'      => 'select',
                'title'     => esc_html__( 'Tag sticky sidebar', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose a sticky sidebar for the tag template', 'vlog' ),
                'options'   => vlog_get_sidebars_list(),
                'default'   => 'vlog_default_sticky_sidebar',
                'required'  => array( 'tag_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'tag_pag',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Pagination', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose a pagination type for tag template', 'vlog' ),
                'options'   => vlog_get_pagination_layouts(),
                'default'   => 'numeric'
            ),

        ) )
);

/* Author */
Redux::setSection( $opt_name ,  array(
        'icon'      => 'el-icon-user',
        'title'     => esc_html__( 'Author Template', 'vlog' ),
        'desc'     => esc_html__( 'Manage settings for the author templates', 'vlog' ),
        'fields'    => array(

            array(
                'id'        => 'author_desc',
                'type'      => 'switch',
                'title'     => esc_html__( 'Author description', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose if you want to display the author avatar with bio/description', 'vlog' ),
                'default'   => true
            ),


            array(
                'id'        => 'author_layout',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Main layout', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose how to display your posts on the author template', 'vlog' ),
                'options'   => vlog_get_main_layouts(),
                'default'   => 'b'
            ),

            array(
                'id'        => 'author_ppp',
                'type'      => 'radio',
                'title'     => esc_html__( 'Posts per page', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose how many posts per page you want to display', 'vlog' ),
                'options'   => array(
                    'inherit' => wp_kses( sprintf( __( 'Inherit from global option in <a href="%s">Settings->Reading</a>', 'vlog' ), admin_url( 'options-general.php' ) ), wp_kses_allowed_html( 'post' ) ),
                    'custom' => esc_html__( 'Custom number', 'vlog' )
                ),
                'default'   => 'inherit'
            ),

            array(
                'id'        => 'author_ppp_num',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => esc_html__( 'Number of posts per page', 'vlog' ),
                'default'   => get_option( 'posts_per_page' ),
                'required'  => array( 'author_ppp', '=', 'custom' ),
                'validate'  => 'numeric'
            ),

            array(
                'id'        => 'author_starter_layout',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Starter layout', 'vlog' ),
                'subtitle'  => esc_html__( 'By choosing a starter layout, first "x" posts on the page will be displayed in this layout', 'vlog' ),
                'options'   => vlog_get_main_layouts( false, true ),
                'default'   => 'none',
            ),

            array(
                'id'        => 'author_starter_limit',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => esc_html__( 'Number of starter posts', 'vlog' ),
                'subtitle'  => esc_html__( 'Specify how many posts to display in "starter" layout', 'vlog' ),
                'default'   => 1,
                'required'  => array( 'author_starter_layout', '!=', 'none' ),
                'validate'  => 'numeric'
            ),

            array(
                'id'        => 'author_use_sidebar',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Display sidebar', 'vlog' ),
                'options'   => vlog_get_sidebar_layouts(),
                'default'   => 'right'
            ),

            array(
                'id'        => 'author_sidebar',
                'type'      => 'select',
                'title'     => esc_html__( 'Author standard sidebar', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose a standard sidebar for the author template', 'vlog' ),
                'options'   => vlog_get_sidebars_list(),
                'default'   => 'vlog_default_sidebar',
                'required'  => array( 'author_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'author_sticky_sidebar',
                'type'      => 'select',
                'title'     => esc_html__( 'Author sticky sidebar', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose a sticky sidebar for the author template', 'vlog' ),
                'options'   => vlog_get_sidebars_list(),
                'default'   => 'vlog_default_sticky_sidebar',
                'required'  => array( 'author_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'author_pag',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Pagination', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose a pagination type for author template', 'vlog' ),
                'options'   => vlog_get_pagination_layouts(),
                'default'   => 'numeric'
            ),

        ) )
);

/* Search */
Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-search',
        'title'     => esc_html__( 'Search Template', 'vlog' ),
        'desc'     => esc_html__( 'Manage settings for the search results template', 'vlog' ),
        'fields'    => array(


            array(
                'id'        => 'search_layout',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Main layout', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose how to display your posts on the search template', 'vlog' ),
                'options'   => vlog_get_main_layouts(),
                'default'   => 'b'
            ),

            array(
                'id'        => 'search_ppp',
                'type'      => 'radio',
                'title'     => esc_html__( 'Posts per page', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose how many posts per page you want to display', 'vlog' ),
                'options'   => array(
                    'inherit' => wp_kses( sprintf( __( 'Inherit from global option in <a href="%s">Settings->Reading</a>', 'vlog' ), admin_url( 'options-general.php' ) ), wp_kses_allowed_html( 'post' ) ),
                    'custom' => esc_html__( 'Custom number', 'vlog' )
                ),
                'default'   => 'inherit'
            ),

            array(
                'id'        => 'search_ppp_num',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => esc_html__( 'Number of posts per page', 'vlog' ),
                'default'   => get_option( 'posts_per_page' ),
                'required'  => array( 'search_ppp', '=', 'custom' ),
                'validate'  => 'numeric'
            ),

            array(
                'id'        => 'search_use_sidebar',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Display sidebar', 'vlog' ),
                'options'   => vlog_get_sidebar_layouts(),
                'default'   => 'right'
            ),

            array(
                'id'        => 'search_sidebar',
                'type'      => 'select',
                'title'     => esc_html__( 'Search standard sidebar', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose a standard sidebar for the search template', 'vlog' ),
                'options'   => vlog_get_sidebars_list(),
                'default'   => 'vlog_default_sidebar',
                'required'  => array( 'search_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'search_sticky_sidebar',
                'type'      => 'select',
                'title'     => esc_html__( 'Search sticky sidebar', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose a sticky sidebar for the search template', 'vlog' ),
                'options'   => vlog_get_sidebars_list(),
                'default'   => 'vlog_default_sticky_sidebar',
                'required'  => array( 'search_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'search_pag',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Pagination', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose a pagination type for search template', 'vlog' ),
                'options'   => vlog_get_pagination_layouts(),
                'default'   => 'numeric'
            ),

        ) )
);

/* Archives */

Redux::setSection( $opt_name ,  array(
        'icon'      => 'el-icon-folder-open',
        'title'     => esc_html__( 'Archive Templates', 'vlog' ),
        'desc'     => esc_html__( 'Manage settings for other miscellaneous templates like date archives, post format archives, index (latest posts) page, etc...', 'vlog' ),
        'fields'    => array(

            array(
                'id'        => 'archive_layout',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Main layout', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose how to display your posts on the archive templates', 'vlog' ),
                'options'   => vlog_get_main_layouts(),
                'default'   => 'b'
            ),


            array(
                'id'        => 'archive_ppp',
                'type'      => 'radio',
                'title'     => esc_html__( 'Posts per page', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose how many posts per page you want to display', 'vlog' ),
                'options'   => array(
                    'inherit' => wp_kses( sprintf( __( 'Inherit from global option in <a href="%s">Settings->Reading</a>', 'vlog' ), admin_url( 'options-general.php' ) ), wp_kses_allowed_html( 'post' ) ),
                    'custom' => esc_html__( 'Custom number', 'vlog' )
                ),
                'default'   => 'inherit'
            ),

            array(
                'id'        => 'archive_ppp_num',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => esc_html__( 'Number of posts per page', 'vlog' ),
                'default'   => get_option( 'posts_per_page' ),
                'required'  => array( 'archive_ppp', '=', 'custom' ),
                'validate'  => 'numeric'
            ),

            array(
                'id'        => 'archive_starter_layout',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Starter layout', 'vlog' ),
                'subtitle'  => esc_html__( 'By choosing a starter layout, first "x" posts on the page will be displayed in this layout', 'vlog' ),
                'options'   => vlog_get_main_layouts( false, true ),
                'default'   => 'none',
            ),

            array(
                'id'        => 'archive_starter_limit',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => esc_html__( 'Number of starter posts', 'vlog' ),
                'subtitle'  => esc_html__( 'Specify how many posts to display in "starter" layout', 'vlog' ),
                'default'   => 2,
                'required'  => array( 'archive_starter_layout', '!=', 'none' ),
                'validate'  => 'numeric'
            ),

            array(
                'id'        => 'archive_use_sidebar',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Display sidebar', 'vlog' ),
                'options'   => vlog_get_sidebar_layouts(),
                'default'   => 'right'
            ),

            array(
                'id'        => 'archive_sidebar',
                'type'      => 'select',
                'title'     => esc_html__( 'Archive standard sidebar', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose a standard sidebar for the archive templates', 'vlog' ),
                'options'   => vlog_get_sidebars_list(),
                'default'   => 'vlog_default_sidebar',
                'required'  => array( 'archive_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'archive_sticky_sidebar',
                'type'      => 'select',
                'title'     => esc_html__( 'Archive sticky sidebar', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose a sticky sidebar for the archive templates', 'vlog' ),
                'options'   => vlog_get_sidebars_list(),
                'default'   => 'vlog_default_sticky_sidebar',
                'required'  => array( 'archive_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'archive_pag',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Pagination', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose a pagination type for archive templates', 'vlog' ),
                'options'   => vlog_get_pagination_layouts(),
                'default'   => 'numeric'
            ),

        ) )
);

/* Typography */
Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-fontsize',
        'title'     => esc_html__( 'Typography', 'vlog' ),
        'desc'     => esc_html__( 'Manage fonts and typography settings', 'vlog' ),
        'fields'    => array(

            array(
                'id'          => 'main_font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Main text font', 'vlog' ),
                'google'      => true,
                'font-backup' => false,
                'font-size' => false,
                'color' => false,
                'line-height' => false,
                'text-align' => false,
                'units'       =>'px',
                'subtitle'    => esc_html__( 'This is your main font, used for standard text', 'vlog' ),
                'default'     => array(
                    'google'      => true,
                    'font-weight'  => '400',
                    'font-family' => 'Lato',
                    'subsets' => 'latin-ext'
                ),
                'preview' => array(
                    'always_display' => true,
                    'font-size' => '16px',
                    'line-height' => '26px',
                    'text' => 'This is a font used for your main content on the website. Here at MeksHQ, we believe that readability is a very important part of any WordPress theme. This is an example of how a simple paragraph of text will look like on your website.'
                )
            ),

            array(
                'id'          => 'h_font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Headings font', 'vlog' ),
                'google'      => true,
                'font-backup' => false,
                'font-size' => false,
                'color' => false,
                'line-height' => false,
                'text-align' => false,
                'units'       =>'px',
                'subtitle'    => esc_html__( 'This is a font used for titles and headings', 'vlog' ),
                'default'     => array(
                    'google'      => true,
                    'font-weight'  => '700',
                    'font-family' => 'Montserrat',
                    'subsets' => 'latin-ext'
                ),
                'preview' => array(
                    'always_display' => true,
                    'font-size' => '24px',
                    'line-height' => '30px',
                    'text' => 'There is no good blog without great readability'
                )

            ),

            array(
                'id'          => 'nav_font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Navigation font', 'vlog' ),
                'google'      => true,
                'font-backup' => false,
                'font-size' => false,
                'color' => false,
                'line-height' => false,
                'text-align' => false,
                'units'       =>'px',
                'subtitle'    => esc_html__( 'This is a font used for main website navigation', 'vlog' ),
                'default'     => array(
                    'font-weight'  => '600',
                    'font-family' => 'Montserrat',
                    'subsets' => 'latin-ext'
                ),

                'preview' => array(
                    'always_display' => true,
                    'font-size' => '16px',
                    'text' => 'Home &nbsp;&nbsp;About &nbsp;&nbsp;Blog &nbsp;&nbsp;Contact'
                )

            ),

            array(
                'id'          => 'finetune',
                'type'        => 'section',
                'indent' => false,
                'title'       => esc_html__( 'Fine-tune typography', 'vlog' ),
                'subtitle'    => esc_html__( 'Advanced options to adjust font sizes', 'vlog' )
            ),

            array(
                'id'       => 'font_size_p',
                'type'     => 'spinner',
                'title'    => esc_html__( 'Main text font size', 'vlog' ),
                'subtitle' => esc_html__( 'This is your body text font size, used for default text on single posts and pages', 'vlog' ),
                'default'  => '16',
                'min'      => '14',
                'step'     => '1',
                'max'      => '22',
            ),

            array(
                'id'       => 'font_size_nav',
                'type'     => 'spinner',
                'title'    => esc_html__( 'Navigation font size', 'vlog' ),
                'subtitle' => esc_html__( 'Applies to main website navigation', 'vlog' ),
                'default'  => '13',
                'min'      => '11',
                'step'     => '1',
                'max'      => '16',
            ),

            array(
                'id'       => 'font_size_mfs',
                'type'     => 'spinner',
                'title'    => esc_html__( "Module and Widget font size", 'vlog' ),
                'subtitle' => esc_html__( 'Applies to text excerpts in modules, text in sidebar and in footer. Note this will not apply to headings.', 'vlog' ),
                'default'  => '14',
                'min'      => '12',
                'step'     => '1',
                'max'      => '18',
            ),

            array(
                'id'       => 'font_size_widget_title',
                'type'     => 'spinner',
                'title'    => esc_html__( 'Widget title', 'vlog' ),
                'subtitle' => esc_html__( 'Applies to widgets titles', 'vlog' ),
                'default'  => '16',
                'min'      => '14',
                'step'     => '1',
                'max'      => '20',
            ),

            array(
                'id'       => 'font_size_module_title',
                'type'     => 'spinner',
                'title'    => esc_html__( 'Module title', 'vlog' ),
                'subtitle' => esc_html__( 'Applies to module titles', 'vlog' ),
                'default'  => '18',
                'min'      => '14',
                'step'     => '1',
                'max'      => '20',
            ),

            array(
                'id'       => 'font_size_h1',
                'type'     => 'spinner',
                'title'    => esc_html__( 'H1 (archive/single title) font size', 'vlog' ),
                'subtitle' => esc_html__( 'Applies to H1 elements, single post, archive titles and layout A title', 'vlog' ),
                'default'  => '28',
                'min'      => '20',
                'step'     => '1',
                'max'      => '40',
            ),

            array(
                'id'       => 'font_size_h2',
                'type'     => 'spinner',
                'title'    => esc_html__( 'H2 font size', 'vlog' ),
                'subtitle' => esc_html__( 'Applies to H2 elements and layout B and C title', 'vlog' ),
                'default'  => '24',
                'min'      => '20',
                'step'     => '1',
                'max'      => '35',
            ),

            array(
                'id'       => 'font_size_h3',
                'type'     => 'spinner',
                'title'    => esc_html__( 'H3 font size', 'vlog' ),
                'subtitle' => esc_html__( 'Applies to H3 elements', 'vlog' ),
                'default'  => '20',
                'min'      => '14',
                'step'     => '1',
                'max'      => '28',
            ),

            array(
                'id'       => 'font_size_h4',
                'type'     => 'spinner',
                'title'    => esc_html__( 'H4 font size', 'vlog' ),
                'subtitle' => esc_html__( 'Applies to H4 elements', 'vlog' ),
                'default'  => '18',
                'min'      => '12',
                'step'     => '1',
                'max'      => '26',
            ),

            array(
                'id'       => 'font_size_h5',
                'type'     => 'spinner',
                'title'    => esc_html__( 'H5 font size', 'vlog' ),
                'subtitle' => esc_html__( 'Applies to H5 elements and layout D and E title', 'vlog' ),
                'default'  => '16',
                'min'      => '14',
                'step'     => '1',
                'max'      => '24',
            ),

            array(
                'id'       => 'font_size_h6',
                'type'     => 'spinner',
                'title'    => esc_html__( 'H6 font size', 'vlog' ),
                'subtitle' => esc_html__( 'Applies to H6 elements and layout F and G title', 'vlog' ),
                'default'  => '14',
                'min'      => '11',
                'step'     => '1',
                'max'      => '18',
            ),

            array(
                'id'       => 'font_size_h7',
                'type'     => 'spinner',
                'title'    => esc_html__( 'Layout H font size', 'vlog' ),
                'subtitle' => esc_html__( 'Applies to layout H title', 'vlog' ),
                'default'  => '13',
                'min'      => '11',
                'step'     => '1',
                'max'      => '16',
            ),

            array(
                'id'       => 'font_size_excerpt_text',
                'type'     => 'spinner',
                'title'    => esc_html__( 'Entry headline', 'vlog' ),
                'subtitle' => esc_html__( 'Font size for text excerpt in the beginning of the single post', 'vlog' ),
                'default'  => '18',
                'min'      => '14',
                'step'     => '1',
                'max'      => '25',
            ),

            array(
                'id'       => 'font_size_meta_data',
                'type'     => 'spinner',
                'title'    => esc_html__( 'Meta Data font size', 'vlog' ),
                'subtitle' => esc_html__( 'Applies to meta data in module layouts.',  'vlog' ),
                'default'  => '12',
                'min'      => '10',
                'step'     => '1',
                'max'      => '20',
            ),

            array(
                'id' => 'uppercase',
                'type' => 'checkbox',
                'multi' => true,
                'title' => esc_html__( 'Uppercase text', 'vlog' ),
                'subtitle' => esc_html__( 'Check if you want to show CAPITAL LETTERS for specific elements', 'vlog' ),
                'options' => array(
                    'site-title' => esc_html__( 'Site title', 'vlog' ),
                    'site-description' => esc_html__( 'Site description', 'vlog' ),
                    'vlog-site-header' => esc_html__( 'Main header elements', 'vlog' ),
                    'vlog-top-bar' => esc_html__( 'Top header elements', 'vlog' ),
                    'entry-title' => esc_html__( 'Post/Page titles', 'vlog' ),
                    'entry-category a' => esc_html__( 'Category links', 'vlog' ),
                    'vlog-mod-title, comment-author .fn' => esc_html__( 'Module/Archive titles', 'vlog' ),
                    'widget-title' => esc_html__( 'Widget titles', 'vlog' )


                ),
                'default' => array(
                    'site-title' => 1,
                    'site-description' => 1,
                    'vlog-site-header' => 1,
                    'vlog-top-bar' => 1,
                    'entry-title' => 0,
                    'entry-category a' => 1,
                    'vlog-mod-title, comment-author .fn' => 1,
                    'widget-title' => 1
                )
            )

        ) )
);

/* Ads */
Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-usd',
        'title'     => esc_html__( 'Ads', 'vlog' ),
        'desc'     => esc_html__( 'Use this options to fill your ads slots. Both image and JavaScript related ads are allowed.', 'vlog' ),
        'fields'    => array(

            array(
                'id' => 'ad_header',
                'type' => 'editor',
                'title' => esc_html__( 'Header ad slot', 'vlog' ),
                'subtitle' => esc_html__( 'This ad will be displayed in website header. You can enable it in header main area settings', 'vlog' ),
                'default' => '',
                'desc' => esc_html__( 'Note: If you want to paste HTML or js code, use "text" mode in editor. Suggested size of an ad banner is 728x90', 'vlog' ),
                'args'   => array(
                    'textarea_rows'    => 5,
                    'default_editor' => 'html'
                )
            ),


            array(
                'id' => 'ad_below_header',
                'type' => 'editor',
                'title' => esc_html__( 'Below header', 'vlog' ),
                'subtitle' => esc_html__( 'This ad will be displayed between your header and website content', 'vlog' ),
                'default' => '',
                'desc' => esc_html__( 'Note: If you want to paste HTML or JavaScript code, use "text" mode in editor', 'vlog' ),
                'args'   => array(
                    'textarea_rows'    => 5,
                    'default_editor' => 'html'
                )
            ),

            array(
                'id' => 'ad_above_footer',
                'type' => 'editor',
                'title' => esc_html__( 'Above footer', 'vlog' ),
                'subtitle' => esc_html__( 'This ad will be displayed between your footer and website content', 'vlog' ),
                'default' => '',
                'desc' => esc_html__( 'Note: If you want to paste HTML or JavaScript code, use "text" mode in editor', 'vlog' ),
                'args'   => array(
                    'textarea_rows'    => 5,
                    'default_editor' => 'html'
                )
            ),

            array(
                'id' => 'ad_above_single',
                'type' => 'editor',
                'title' => esc_html__( 'Above single post content', 'vlog' ),
                'subtitle' => esc_html__( 'This ad will be displayed above post content on your single post templates', 'vlog' ),
                'default' => '',
                'desc' => esc_html__( 'Note: If you want to paste HTML or JavaScript code, use "text" mode in editor', 'vlog' ),
                'args'   => array(
                    'textarea_rows'    => 5,
                    'default_editor' => 'html'
                )
            ),

            array(
                'id' => 'ad_below_single',
                'type' => 'editor',
                'title' => esc_html__( 'Below single post content', 'vlog' ),
                'subtitle' => esc_html__( 'This ad will be displayed below post content on your single post templates', 'vlog' ),
                'default' => '',
                'desc' => esc_html__( 'Note: If you want to paste HTML or JavaScript code, use "text" mode in editor', 'vlog' ),
                'args'   => array(
                    'textarea_rows'    => 5,
                    'default_editor' => 'html'
                )
            ),

            array(
                'id' => 'ad_between_posts',
                'type' => 'editor',
                'title' => esc_html__( 'Between posts', 'vlog' ),
                'subtitle' => esc_html__( 'This ad will be displayed between posts on archive templates such as category archives, tag archives etc...', 'vlog' ),
                'default' => '',
                'desc' => esc_html__( 'Note: If you want to paste HTML or JavaScript code, use "text" mode in editor', 'vlog' ),
                'args'   => array(
                    'textarea_rows'    => 5,
                    'default_editor' => 'html'
                )
            ),

            array(
                'id' => 'ad_between_posts_position',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'Between posts position', 'vlog' ),
                'subtitle' => esc_html__( 'Specify after how many posts you want to display ad', 'vlog' ),
                'default' => 4,
                'validate' => 'numeric'
            ),
	
	        array(
		        'id'       => 'ad_exclude_404',
		        'type'     => 'switch',
		        'title'    => esc_html__( 'Do not show ads on 404 page', 'vlog' ),
		        'subtitle' => esc_html__( 'Disable ads on 404 error page', 'vlog' ),
		        'default'  => false,
	        ),
	
	        array(
		        'id'       => 'ad_exclude_from_pages',
		        'type'     => 'select',
		        'title'    => esc_html__( 'Do not show ads on specific pages', 'vlog' ),
		        'subtitle' => esc_html__( 'Select pages on which you don\'t want to display ads', 'vlog' ),
		        'multi'    => true,
		        'sortable' => true,
		        'data'     => 'page',
		        'args'     => array(
			        'posts_per_page' => - 1,
		        ),
		        'default'  => array(),
	        ),
        )
    )
);

/* WooCommerce */

if ( vlog_is_woocommerce_active() ) {

    Redux::setSection( $opt_name , array(
            'icon'      => 'el-icon-shopping-cart',
            'title' => esc_html__( 'WooCommerce', 'vlog' ),
            'desc' => esc_html__( 'Manage options for WooCommerce pages', 'vlog' ),
            'fields' => array(
                array(
                    'id'        => 'product_use_sidebar',
                    'type'      => 'image_select',
                    'title'     => esc_html__( 'Product sidebar layout', 'vlog' ),
                    'subtitle'  => esc_html__( 'Choose sidebar layout for WooCommerce products', 'vlog' ),
                    'options'   => vlog_get_sidebar_layouts(),
                    'default'   => 'right'
                ),

                array(
                    'id'        => 'product_sidebar',
                    'type'      => 'select',
                    'title'     => esc_html__( 'Product standard sidebar', 'vlog' ),
                    'subtitle'  => esc_html__( 'Choose standard sidebar for WooCommerce products', 'vlog' ),
                    'options'   => vlog_get_sidebars_list(),
                    'default'   => 'vlog_default_sidebar',
                    'required'  => array( 'product_use_sidebar', '!=', 'none' )
                ),

                array(
                    'id'        => 'product_sticky_sidebar',
                    'type'      => 'select',
                    'title'     => esc_html__( 'Product sticky sidebar', 'vlog' ),
                    'subtitle'  => esc_html__( 'Choose sticky sidebar for WooCommerce products', 'vlog' ),
                    'options'   => vlog_get_sidebars_list(),
                    'default'   => 'vlog_default_sticky_sidebar',
                    'required'  => array( 'product_use_sidebar', '!=', 'none' )
                ),

                array(
                    'id'        => 'product_archive_use_sidebar',
                    'type'      => 'image_select',
                    'title'     => esc_html__( 'Product archives sidebar layout', 'vlog' ),
                    'subtitle'  => esc_html__( 'Choose sidebar layout for WooCommerce products category, tag, archive etc...', 'vlog' ),
                    'options'   => vlog_get_sidebar_layouts(),
                    'default'   => 'right'
                ),

                array(
                    'id'        => 'product_archive_sidebar',
                    'type'      => 'select',
                    'title'     => esc_html__( 'Product archives standard sidebar', 'vlog' ),
                    'subtitle'  => esc_html__( 'Choose standard sidebar for WooCommerce products category, tag, archive etc...', 'vlog' ),
                    'options'   => vlog_get_sidebars_list(),
                    'default'   => 'vlog_default_sidebar',
                    'required'  => array( 'product_archive_use_sidebar', '!=', 'none' )
                ),

                array(
                    'id'        => 'product_archive_sticky_sidebar',
                    'type'      => 'select',
                    'title'     => esc_html__( 'Product archives sticky sidebar', 'vlog' ),
                    'subtitle'  => esc_html__( 'Choose sticky sidebar for WooCommerce products category, tag, archive etc...', 'vlog' ),
                    'options'   => vlog_get_sidebars_list(),
                    'default'   => 'vlog_default_sticky_sidebar',
                    'required'  => array( 'product_archive_use_sidebar', '!=', 'none' )
                )
            ) )
    );
}

/* bbPress */

if ( vlog_is_bbpress_active() ) {
    Redux::setSection( $opt_name , array(
            'icon'      => 'el-icon-quotes',
            'title' => esc_html__( 'bbPress', 'vlog' ),
            'desc' => esc_html__( 'Manage options for bbPress pages', 'vlog' ),
            'fields' => array(
                array(
                    'id'        => 'forum_use_sidebar',
                    'type'      => 'image_select',
                    'title'     => esc_html__( 'Forum sidebar layout', 'vlog' ),
                    'subtitle'  => esc_html__( 'Choose sidebar layout for bbPress forums', 'vlog' ),
                    'options'   => vlog_get_sidebar_layouts(),
                    'default'   => 'right'
                ),

                array(
                    'id'        => 'forum_sidebar',
                    'type'      => 'select',
                    'title'     => esc_html__( 'Forum standard sidebar', 'vlog' ),
                    'subtitle'  => esc_html__( 'Choose standard sidebar for bbPress forums', 'vlog' ),
                    'options'   => vlog_get_sidebars_list(),
                    'default'   => 'vlog_default_sidebar',
                    'required'  => array( 'forum_use_sidebar', '!=', 'none' )
                ),

                array(
                    'id'        => 'forum_sticky_sidebar',
                    'type'      => 'select',
                    'title'     => esc_html__( 'Forum sticky sidebar', 'vlog' ),
                    'subtitle'  => esc_html__( 'Choose sticky sidebar for bbPress forums', 'vlog' ),
                    'options'   => vlog_get_sidebars_list(),
                    'default'   => 'vlog_default_sticky_sidebar',
                    'required'  => array( 'forum_use_sidebar', '!=', 'none' )
                ),

                array(
                    'id'        => 'topic_use_sidebar',
                    'type'      => 'image_select',
                    'title'     => esc_html__( 'Topic sidebar layout', 'vlog' ),
                    'subtitle'  => esc_html__( 'Choose sidebar layout for bbPress topics', 'vlog' ),
                    'options'   => vlog_get_sidebar_layouts(),
                    'default'   => 'right'
                ),

                array(
                    'id'        => 'topic_sidebar',
                    'type'      => 'select',
                    'title'     => esc_html__( 'Topic standard sidebar', 'vlog' ),
                    'subtitle'  => esc_html__( 'Choose standard sidebar for bbPress topics', 'vlog' ),
                    'options'   => vlog_get_sidebars_list(),
                    'default'   => 'vlog_default_sidebar',
                    'required'  => array( 'topic_use_sidebar', '!=', 'none' )
                ),

                array(
                    'id'        => 'topic_sticky_sidebar',
                    'type'      => 'select',
                    'title'     => esc_html__( 'Topic sticky sidebar', 'vlog' ),
                    'subtitle'  => esc_html__( 'Choose sticky sidebar for bbPress topics', 'vlog' ),
                    'options'   => vlog_get_sidebars_list(),
                    'default'   => 'vlog_default_sticky_sidebar',
                    'required'  => array( 'topic_use_sidebar', '!=', 'none' )
                )


            ) )
    );
}

/* Misc. */
Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-wrench',
        'title'     => esc_html__( 'Misc.', 'vlog' ),
        'desc'     => esc_html__( 'These are some additional miscellaneous theme settings', 'vlog' ),
        'fields'    => array(

            array(
                'id' => 'rtl_mode',
                'type' => 'switch',
                'title' => esc_html__( 'RTL mode (right to left)', 'vlog' ),
                'subtitle' => esc_html__( 'Enable this option if you are using right to left writing/reading', 'vlog' ),
                'default' => false
            ),

            array(
                'id' => 'rtl_lang_skip',
                'type' => 'text',
                'title' => esc_html__( 'Skip RTL for specific language(s)', 'vlog' ),
                'subtitle' => wp_kses_post( sprintf( __( 'Paste specific WordPress language <a href="%s" target="_blank">locale code</a> to exclude it from the RTL mode', 'vlog' ), 'http://wpcentral.io/internationalization/' )),
                'desc' => esc_html__( 'i.e. If you are using Arabic and English versions on the same WordPress installation you should put "en_US" in this field and its version will not be displayed as RTL. Note: To exclude multiple languages, separate by comma: en_US, de_DE', 'vlog' ),
                'default' => '',
                'required' => array( 'rtl_mode', '=', true )
            ),

            array(
                'id'        => 'social_share',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => esc_html__( 'Social sharing', 'vlog' ),
                'subtitle'  => esc_html__( 'Choose social networks that you want to use for sharing posts', 'vlog' ),
                'options'   => array(
                    'facebook' => esc_html__( 'Facebook', 'vlog' ),
                    'twitter' => esc_html__( 'Twitter', 'vlog' ),
                    'reddit' => esc_html__( 'Reddit', 'vlog' ),
                    'pinterest' => esc_html__( 'Pinterest', 'vlog' ),
                    'email' => esc_html__( 'Email', 'vlog' ),
                    'gplus' => esc_html__( 'Google+', 'vlog' ),
                    'linkedin' => esc_html__( 'LinkedIN', 'vlog' ),
                    'stumbleupon' => esc_html__( 'StumbleUpon', 'vlog' ),
                    'whatsapp' => esc_html__( 'WhatsApp', 'vlog' ),
                    'vk' => esc_html__( 'vKontakte', 'vlog' ),

                ),
                'default' => array(
                    'facebook' => 1,
                    'twitter' => 1,
                    'reddit' => 1,
                    'pinterest' => 1,
                    'email' => 1,
                    'gplus' => 0,
                    'linkedin' => 0,
                    'stumbleupon' => 0,
                    'whatsapp' => 0,
                    'vk' => 0
                ),
            ),

            array(
                'id' => 'watch_later_ajax',
                'type' => 'switch',
                'title' => esc_html__( 'Load "watch later" area asynchronously', 'vlog' ),
                'subtitle' => esc_html__( 'Check this option to prevent conflict in "Watch later" area if you are using caching on your website.', 'vlog' ),
                'default' => false
            ),

            array(
                'id' => 'listen_later_ajax',
                'type' => 'switch',
                'title' => esc_html__( 'Load "Listen later" area asynchronously', 'vlog' ),
                'subtitle' => esc_html__( 'Check this option to prevent conflict in "Listen later" area if you are using caching on your website.', 'vlog' ),
                'default' => false
            ),

            array(
                'id' => 'more_string',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'More string', 'vlog' ),
                'subtitle' => esc_html__( 'Specify your "more" string to append after limited post excerpts', 'vlog' ),
                'default' => '...',
                'validate' => 'no_html'
            ),

            array(
                'id' => 'auto_gallery_img_sizes',
                'type' => 'switch',
                'title' => esc_html__( 'Automatic gallery image sizes', 'vlog' ),
                'subtitle' => esc_html__( 'If you enable this option, theme will automatically detect best possible size for your galleries, depending of gallery columns number you choose', 'vlog' ),
                'default' => true
            ),

            array(
                'id' => 'views_forgery',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'Post views forgery', 'vlog' ),
                'subtitle' => esc_html__( 'Specify a value to add to the real number of entry views for each post', 'vlog' ),
                'desc' => esc_html__( 'i.e. If a post has 45 views and you put 100, your post will display 145 views', 'vlog' ),
                'default' => '',
                'validate' => 'numeric'
            ),

            array(
                'id' => 'on_single_img_popup',
                'type' => 'switch',
                'title' => esc_html__( 'Open content image(s) in pop-up', 'vlog' ),
                'subtitle' => esc_html__( 'Enable this option if you want to open your content image(s) in pop-up', 'vlog' ),
                'default' => false
            ),

            array(
                'id' => 'special_tag',
                'type' => 'select',
                'data' => 'tags',
                'args' => array('hide_empty' => false),
                'title' => esc_html__( 'Special tag', 'vlog' ),
                'subtitle' => esc_html__( 'By choosing a special tag, all your posts tagged with this particular tag may display a tag label over its featured image on the most of available post layouts (i.e HD)', 'vlog' ),
                'default' => 0
            ),

            array(
                'id'        => 'breadcrumbs',
                'type'      => 'radio',
                'title'     => esc_html__( 'Enable breadcrumbs support', 'vlog' ),
                'subtitle'  => esc_html__( 'Select a plugin you are using for breadcrumbs', 'vlog' ),
                'options'   => array(
                        'none' => esc_html__( 'None', 'vlog' ),
                        'yoast' => esc_html__( 'Yoast SEO (or Yoast Breadcrumbs)', 'vlog' ),
                        'bcn' => esc_html__( 'Breadcrumb NavXT', 'vlog' ),
                    ),
                'default'   => 'none',
            ),

            array(
                'id' => 'words_read_per_minute',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'Words to read per minute', 'vlog' ),
                'subtitle' => esc_html__( 'Use this option to set number of words your visitors read per minute, in order to fine-tune calculation of post reading time meta data', 'vlog' ),
                'validate' => 'numeric',
                'default' => 200
            ),

            array(
                'id' => 'subscribe_video_url',
                'type' => 'text',
                'title' => esc_html__( 'Subscribe URL for videos', 'vlog' ),
                'subtitle' => esc_html__( 'Specify your video channel URL if you are using subscribe action button for videos', 'vlog' ),
                'default' => ''
            ),
            
            array(
                'id' => 'primary_category',
                'type' => 'switch',
                'title' => esc_html__( 'Primary category support', 'vlog' ),
                'subtitle' => esc_html__( 'This option supports primary category feature from Yoast SEO plugin. If a post is assigned to multiple categories, only selected primary category will be displayed for that post in all listing layouts', 'vlog' ),
                'default' => false
            )

        )
    )
);



Redux::setSection( $opt_name , array(
        'type' => 'divide',
        'id' => 'vlog-divide',
    ) );

/* Translation Options */

$translate_options[] = array(
    'id' => 'enable_translate',
    'type' => 'switch',
    'switch' => true,
    'title' => esc_html__( 'Enable theme translation?', 'vlog' ),
    'default' => '1'
);

$translate_strings = vlog_get_translate_options();

foreach ( $translate_strings as $string_key => $string ) {
    $translate_options[] = array(
        'id' => 'tr_'.$string_key,
        'type' => 'text',
        'title' => esc_html( $string['text'] ),
        'subtitle' => isset( $string['desc'] ) ? $string['desc'] : '',
        'default' => ''
    );
}

Redux::setSection( $opt_name, array(
        'icon'      => 'el-icon-globe-alt',
        'title' => esc_html__( 'Translation', 'vlog' ),
        'desc' => __( 'Use these settings to quckly translate or change the text in this theme. If you want to remove the text completely instead of modifying it, you can use <strong>"-1"</strong> as a value for particular field translation. <br/><br/><strong>Note:</strong> If you are using this theme for a multilingual website, you need to disable these options and use multilanguage plugins (such as WPML) and manual translation with .po and .mo files located inside the "languages" folder.', 'vlog' ),
        'fields' => $translate_options
    ) );

/* Performance */
Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-dashboard',
        'title'     => esc_html__( 'Performance', 'vlog' ),
        'desc'     => esc_html__( 'Use these options to put your theme to a high speed as well as save your server resources!', 'vlog' ),
        'fields'    => array(

            array(
                'id' => 'minify_css',
                'type' => 'switch',
                'title' => esc_html__( 'Use minified CSS', 'vlog' ),
                'subtitle' => esc_html__( 'Load all theme css files combined and minified into a single file.', 'vlog' ),
                'default' => true
            ),

            array(
                'id' => 'minify_js',
                'type' => 'switch',
                'title' => esc_html__( 'Use minified JS', 'vlog' ),
                'subtitle' => esc_html__( 'Load all theme js files combined and minified into a single file.', 'vlog' ),
                'default' => true
            ),

            array(
                'id' => 'disable_img_sizes',
                'type' => 'checkbox',
                'multi' => true,
                'title' => esc_html__( 'Disable additional image sizes', 'vlog' ),
                'subtitle' => esc_html__( 'By default, theme generates additional image size for each of the layouts it offers. You can use this option to avoid creating additional sizes if you are not using particular layout and save your server bandwith.', 'vlog' ),
                'options' => array(
                    'a' => esc_html__( 'Layout A (also used for pages and classic single posts)', 'vlog' ),
                    'b' => esc_html__( 'Layout B', 'vlog' ),
                    'c' => esc_html__( 'Layout C', 'vlog' ),
                    'd' => esc_html__( 'Layout D', 'vlog' ),
                    'e' => esc_html__( 'Layout E', 'vlog' ),
                    'f' => esc_html__( 'Layout F', 'vlog' ),
                    'g' => esc_html__( 'Layout G', 'vlog' ),
                    'h' => esc_html__( 'Layout H (also used for post widget and watch later area)', 'vlog' ),
                    'cover-123' => esc_html__( 'Cover layout 1,2,3', 'vlog' ),
                    'cover-4' => esc_html__( 'Cover layout 4', 'vlog' ),
                    'cover-5' => esc_html__( 'Cover layout 5', 'vlog' ),
                ),

                'default' => array()
            ),



        ) ) );

/* Additional code */

Redux::setSection( $opt_name, array(
        'icon'      => 'el-icon-css',
        'title' => esc_html__( 'Additional Code', 'vlog' ),
        'desc' =>  esc_html__( 'Modify the default styling of the theme by adding custom CSS or JavaScript code. Note: These options are for advanced users only, so use it with caution.', 'vlog' ),
        'fields' => array(


            array(
                'id'       => 'additional_css',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'Additional CSS', 'vlog' ),
                'subtitle' => esc_html__( 'Use this field to add CSS code and modify the default theme styling', 'vlog' ),
                'mode'     => 'css',
                'theme'    => 'monokai',
                'default'  => ''
            ),

            array(
                'id'       => 'additional_js',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'Additional JavaScript', 'vlog' ),
                'subtitle' => esc_html__( 'Use this field to add JavaScript code', 'vlog' ),
                'desc' => esc_html__( 'Note: Please use clean execution JavaScript code without "script" tags', 'vlog' ),
                'mode'     => 'javascript',
                'theme'    => 'monokai',
                'default'  => ''
            )

        ) )
);



/* Updater Options */

Redux::setSection( $opt_name, array(
        'icon'      => 'el-icon-time',
        'title' => esc_html__( 'Updater', 'vlog' ),
        'desc' => wp_kses( sprintf( __( 'Specify your ThemeForest username and API Key to enable theme update notification. When there is a new version of the theme, it will appear on your <a href="%s">updates screen</a>.', 'vlog' ), admin_url( 'update-core.php' ) ), wp_kses_allowed_html( 'post' ) ),
        'fields' => array(

            array(
                'id' => 'theme_update_username',
                'type' => 'text',
                'title' => esc_html__( 'Your ThemeForest Username', 'vlog' ),
                'default' => ''
            ),

            array(
                'id' => 'theme_update_apikey',
                'type' => 'text',
                'title' => esc_html__( 'Your ThemeForest API Key', 'vlog' ),
                'desc' => wp_kses( sprintf( __( 'Where can I find my %s?', 'vlog' ), '<a href="http://themeforest.net/help/api" target="_blank">API key</a>' ), wp_kses_allowed_html( 'post' ) ),
                'default' => ''
            )
        ) )
);




?>

<?php
/**
 * @package     benko
 * @version     1.0
 * @author      NanoAgency
 * @link        http://www.nanoagency.co
 * @copyright   Copyright (c) 2016 NanoAgency
 * @license     GPL v2
 */

if (class_exists('WPBakeryVisualComposerAbstract')) {

    function benko_vc_templates( $default_templates ) {
        // New templates
        $new_templates = array(
            'templates-home-1' => array(
                'name' 			=> esc_html__( 'Templates Home 1', 'benko' ),
                'weight' 		=> 0,
                'image_path' 	=> get_template_directory_uri() . '/inc/backend/assets/images/home/home1.jpg',
                'custom_class'	=> '',
                'content' 		=> '[vc_row full_width="stretch_row" css=".vc_custom_1524619812384{margin-top: -45px !important;background-position: 0 0 !important;background-repeat: repeat !important;}"][vc_column][top_blog layout_types="column3" number_post="6" category_name=""][/vc_column][/vc_row][vc_row css=".vc_custom_1525233398458{margin-top: 30px !important;}"][vc_column][blog_featured number_post="6" show_post="4" meta="" title="Editors Picks" category_name=""][/vc_column][/vc_row][vc_row css=".vc_custom_1523460746134{margin-top: 50px !important;}"][vc_column][vc_single_image image="1269" img_size="full" alignment="center"][/vc_column][/vc_row][vc_row][vc_column width="3/4" css=".vc_custom_1524539866372{padding-right: 35px !important;}"][box_video layout_types="list" auto_play="" category_name="" title="Watch now"][blog number="9" filter="" title="Latest News" category_name=""][vc_single_image image="1268" img_size="full" alignment="center" css=".vc_custom_1524585903314{margin-top: 50px !important;}"][box_category layout_types="box1" columns="3" type_post="news" number_post="3" meta="" category_name="" title="Entertainment" cat_link="http://192.168.1.54/wp/wp-benko/category/entertainment/"][box_category layout_types="box1" columns="3" type_post="news" number_post="3" meta="" category_name="" title="Health & Fitness" cat_link="http://192.168.1.54/wp/wp-benko/category/health-fitness/"][box_category layout_types="box1" columns="3" type_post="news" number_post="3" meta="" category_name="" title="Fashion & Style" cat_link=""][box_category layout_types="box1" columns="3" type_post="news" number_post="3" filter="" meta="" category_name="" title="Lifestyle" cat_link="http://192.168.1.54/wp/wp-benko/category/lifestyle/"][/vc_column][vc_column width="1/4" css=".vc_custom_1524569875536{margin-top: 60px !important;padding-right: 15px !important;padding-left: 15px !important;}"][vc_widget_sidebar sidebar_id="single"][/vc_column][/vc_row][vc_row][vc_column][vc_single_image image="1413" img_size="full" alignment="center" css=".vc_custom_1524589666010{margin-top: 50px !important;}"][/vc_column][/vc_row]
'
            ),
            'templates-home-2' => array(
                'name' 			=> esc_html__( 'Templates Home 2', 'benko' ),
                'weight' 		=> 0,
                'image_path' 	=> get_template_directory_uri() . '/inc/backend/assets/images/home/home2.jpg',
                'custom_class'	=> '',
                'content' 		=> '[vc_row css=".vc_custom_1524819622176{margin-top: -40px !important;margin-bottom: 30px !important;background-position: 0 0 !important;background-repeat: repeat !important;}"][vc_column][top_blog layout_types="column4" type_post="yes" number_post="6" title="Todays News" category_name=""][/vc_column][/vc_row][vc_row][vc_column][post_blog number_post="" layout_types="" type_post="" title="Demo" category_name="" ids=""][/vc_column][/vc_row][vc_row css=".vc_custom_1524819644434{margin-top: 30px !important;}"][vc_column][box_video title_style="center" layout_types="grid" auto_play="" title="Latest Videos"][/vc_column][/vc_row][vc_row css=".vc_custom_1524819753784{margin-top: 60px !important;}"][vc_column][vc_single_image image="1268" img_size="full" alignment="center"][/vc_column][/vc_row][vc_row css=".vc_custom_1524819672498{margin-top: 30px !important;margin-bottom: 60px !important;}"][vc_column][blog title_style="center" post_layout="grid-list" number="18" columns="2" title="Latest News" category_name=""][/vc_column][/vc_row][vc_row][vc_column][vc_single_image image="966" img_size="full" alignment="center"][/vc_column][/vc_row]'
            ),
            'templates-home-3' => array(
                'name' 			=> esc_html__( 'Templates Home 3', 'benko' ),
                'weight' 		=> 0,
                'image_path' 	=> get_template_directory_uri() . '/inc/backend/assets/images/home/home3.jpg',
                'custom_class'	=> '',
                'content' 		=> '[vc_row css=".vc_custom_1524843014578{margin-top: -20px !important;background-position: 0 0 !important;background-repeat: repeat !important;}"][vc_column][top_blog type_post="yes" number_post="6" title="Todays News" category_name=""][/vc_column][/vc_row][vc_row][vc_column width="3/4" css=".vc_custom_1524841815890{margin-top: -10px !important;padding-right: 35px !important;}"][box_video layout_types="carousel" auto_play="" category_name=""][vc_single_image image="1268" img_size="full" alignment="center" css=".vc_custom_1524843136814{margin-top: 30px !important;}"][box_category layout_types="box6" type_post="views" number_post="4" filter="yes" meta="" category_name="" title="Most Popular"][box_category layout_types="box9" type_post="news" filter="" meta="" category_name="" title="Entertainment" cat_link=""][box_category layout_types="box1" type_post="news" number_post="4" filter="" meta="" category_name="" title="Fashion & Style" cat_link="http://192.168.1.54/wp/wp-benko/category/fashion-style/"][box_category layout_types="box6" type_post="news" number_post="4" filter="" meta="" category_name="" title="Lifestyle" cat_link=""][vc_single_image image="1268" img_size="full" alignment="center" css=".vc_custom_1524843136814{margin-top: 30px !important;}"][blog number="18" columns="2" title="Latest News" category_name=""][/vc_column][vc_column width="1/4" css=".vc_custom_1524843046660{margin-top: 40px !important;padding-right: 15px !important;padding-left: 15px !important;}"][vc_widget_sidebar sidebar_id="blogs"][/vc_column][/vc_row][vc_row css=".vc_custom_1524906004238{margin-top: 30px !important;}"][vc_column][vc_single_image image="966" img_size="full" alignment="center"][/vc_column][/vc_row]'
            ),
            'templates-contact-us' => array(
                'name' 			=> esc_html__( 'Templates Contact Us', 'benko' ),
                'weight' 		=> 0,
                'custom_class'	=> '',
                'content' 		=> '[vc_row][vc_column][vc_gmaps link="#E-8_JTNDaWZyYW1lJTIwc3JjJTNEJTIyaHR0cHMlM0ElMkYlMkZ3d3cuZ29vZ2xlLmNvbSUyRm1hcHMlMkZlbWJlZCUzRnBiJTNEJTIxMW0xOCUyMTFtMTIlMjExbTMlMjExZDYzMDQuODI5OTg2MTMxMjcxJTIxMmQtMTIyLjQ3NDY5NjgwMzMwOTIlMjEzZDM3LjgwMzc0NzUyMTYwNDQzJTIxMm0zJTIxMWYwJTIxMmYwJTIxM2YwJTIxM20yJTIxMWkxMDI0JTIxMmk3NjglMjE0ZjEzLjElMjEzbTMlMjExbTIlMjExczB4ODA4NTg2ZTYzMDI2MTVhMSUyNTNBMHg4NmJkMTMwMjUxNzU3YzAwJTIxMnNTdG9yZXklMkJBdmUlMjUyQyUyQlNhbiUyQkZyYW5jaXNjbyUyNTJDJTJCQ0ElMkI5NDEyOSUyMTVlMCUyMTNtMiUyMTFzZW4lMjEyc3VzJTIxNHYxNDM1ODI2NDMyMDUxJTIyJTIwd2lkdGglM0QlMjI2MDAlMjIlMjBoZWlnaHQlM0QlMjI2MDAlMjIlMjBmcmFtZWJvcmRlciUzRCUyMjAlMjIlMjBzdHlsZSUzRCUyMmJvcmRlciUzQTAlMjIlMjBhbGxvd2Z1bGxzY3JlZW4lM0UlM0MlMkZpZnJhbWUlM0U="][/vc_column][/vc_row][vc_row full_width="stretch_row"][vc_column el_class="box-contact" offset="vc_col-lg-6 vc_col-md-12"][vc_custom_heading text="Get in touch with us " font_container="tag:h2|font_size:24|text_align:left|margin_bottom:35px|color:%23262626" use_theme_fonts="yes"][contact-form-7 id="76" title="Get in touch with us "][/vc_column][vc_column css=".vc_custom_1516208930382{margin-left: 50px !important;padding-left: 30px !important;}" offset="vc_col-lg-6 vc_col-md-12"][vc_custom_heading text="Contact Details" font_container="tag:h2|font_size:24|text_align:left|margin_bottom:35px|color:%23262626" use_theme_fonts="yes"][vc_column_text]<i class="fa fa-map-marker"></i> 198 West 21th Street, Suite 721 New York, NY 10010

<i class="fa fa-phone"></i> Phone: +95 (0) 123 456 789

<i class="fa fa-envelope-o"></i> <a href="mailto:nanoagency@gmail.com">nanoagency.co@gmail.com</a>[/vc_column_text][vc_single_image image="1144" img_size="600x329" css=".vc_custom_1516208948273{margin-top: 30px !important;}"][/vc_column][/vc_row]',
            ),

        );


        foreach ( array_reverse( $new_templates ) as $template ) {
            array_unshift( $default_templates, $template );
        }

        return $default_templates;
    }
    add_filter( 'vc_load_default_templates', 'benko_vc_templates' );

}

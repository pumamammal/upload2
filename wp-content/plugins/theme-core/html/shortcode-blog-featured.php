<?php
/**
 * The default template for displaying content
 *
 * @author      nanoagency
 * @link        http://nanoagency.co
 * @copyright   Copyright (c) 2015 nanoagency
 * @license     GPL v2
 */
$add_rtl="false";
if(is_rtl()){
    $add_rtl="true";
}
$format = get_post_format();
$add_class= $class ='';
$args = array(
    'category_name'  => $atts['category_name'],
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => $atts['number_post'],
    'meta_key'       => 'post_views_count',
    'orderby'       =>'meta_value_num',
    'order'         =>'DESC',
);
//check post type
if( $atts['type_post'] == 'featured' ){
    $meta_query[] = array(
        'key'   => '_featured',
        'value' => 'yes'
    );
    $args['meta_query'] = $meta_query;
}
//check column
$the_query = new WP_Query($args);
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
?>
<div class="box-featured">
<?php if ($atts['title']) { ?>
    <h5 class="widgettitle box-title"><?php echo esc_html($atts['title']); ?></h5>
<?php } ?>
<div class="row">
<div class="posts-featured article-carousel" data-rtl="<?php echo esc_attr($add_rtl);?>" data-number="<?php echo esc_attr($atts['show_post']);?>"  data-dots="false" data-table="2" data-mobile = "2" data-mobilemin = "1" data-arrows="false">

        <?php  $n=1;
            while ( $the_query->have_posts() ) {
            $the_query->the_post(); ?>
                <div class="description-hidden col-item archive-blog clearfix <?php echo esc_attr($class);?>">
                    <?php
                    switch ($atts['layout_section']) {
                        case 'layout_grid':
                            na_part_templates('layout/content-square');
                        break;

                        default:
                            na_part_templates('layout/content-grid-vertical');
                        break;
                    }
                    ?>
                </div>
            <?php $n++;  }  ?>
        <?php wp_reset_postdata();?>
    </div>
</div>
</div>
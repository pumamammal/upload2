<?php
/**
 * The default template for displaying content
 *
 * @author      NanoAgency
 * @link        http://nanoagency.co
 * @copyright   Copyright (c) 2015 NanoAgency
 * @license     GPL v2
 */

$format = get_post_format();
$add_rtl="false";
if(is_rtl()){
    $add_rtl="true";
}
$ids=explode(',',$atts['ids']);
$args = array(
    'post__in'  =>$ids,
    'post_type'      => 'post',
    'post_status'    => 'publish',
);
//news or featured post
$the_query = new WP_Query($args);
$count = $the_query->found_posts;?>

<div class="box-sliders box-sliders-half">
    <div class="article-carousel" data-rtl="<?php echo esc_attr($add_rtl);?>"  data-table="1" data-number="1" data-mobile = "1" data-mobilemin = "1" data-dots="true" data-arrows="false">
        <?php
        if ($the_query->have_posts()):
            while ($the_query->have_posts()): $the_query->the_post();
                    na_part_templates('layout/slider-half');
            endwhile;
        endif;
        wp_reset_postdata();
        ?>

    </div>
</div>



